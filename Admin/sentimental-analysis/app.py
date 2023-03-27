import pymysql
from flask import Flask, request, render_template
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
import nltk
from string import punctuation
import re
from nltk.corpus import stopwords

nltk.download('stopwords')

set(stopwords.words('english'))

app = Flask(__name__)

# function to fetch reviews from database for a given product id
def fetch_review(product_id):
    # establish a database connection
    conn = pymysql.connect(host='localhost',
                           user='root',
                           password='',
                           db='db_spicehut',
                           charset='utf8mb4',
                           cursorclass=pymysql.cursors.DictCursor)

    # fetch the user_review column from the review_table for the given product_id
    with conn.cursor() as cursor:
        sql = "SELECT user_review FROM review_table WHERE product_id=%s"
        cursor.execute(sql, product_id)
        result = cursor.fetchall()

    # close the database connection
    conn.close()

    # join all reviews into a single string
    review_text = " ".join([row["user_review"] for row in result])

    return review_text

@app.route('/')
def index():
    # establish a database connection
    conn = pymysql.connect(host='localhost',
                           user='root',
                           password='',
                           db='db_spicehut',
                           charset='utf8mb4',
                           cursorclass=pymysql.cursors.DictCursor)

    # fetch all products from the tbl_product table
    with conn.cursor() as cursor:
        sql = "SELECT * FROM tbl_product"
        cursor.execute(sql)
        result = cursor.fetchall()

    # close the database connection
    conn.close()

    return render_template('form.html', products=result)

@app.route('/product_details/<int:product_id>')
def product_details(product_id):
    # establish a database connection
    conn = pymysql.connect(host='localhost',
                           user='root',
                           password='',
                           db='db_spicehut',
                           charset='utf8mb4',
                           cursorclass=pymysql.cursors.DictCursor)

    # fetch product details for the given product_id
    with conn.cursor() as cursor:
        sql = "SELECT * FROM tbl_product WHERE product_id=%s"
        cursor.execute(sql, product_id)
        result = cursor.fetchone()

    # close the database connection
    conn.close()

    # fetch all reviews and join them into a single string
    review_text = fetch_review(product_id)

    stop_words = stopwords.words('english')
    
    # convert to lowercase
    text1 = review_text.lower()
    
    text_final = ''.join(c for c in text1 if not c.isdigit())
    
    # remove stopwords    
    processed_doc1 = ' '.join([word for word in text_final.split() if word not in stop_words])

    sa = SentimentIntensityAnalyzer()
    dd = sa.polarity_scores(text=processed_doc1)
    compound = round((1 + dd['compound'])/2, 2)
    positive = round(dd['pos'], 2)
    negative = round(dd['neg'], 2)
    neutral = round(dd['neu'], 2)

    return render_template('product_details.html', product=result, final=compound, text2=positive, text3=neutral, text4=dd['compound'], text5=negative)

if __name__ == "__main__":
    app.run(debug=True, host="127.0.0.1", port=5002, threaded=True)
