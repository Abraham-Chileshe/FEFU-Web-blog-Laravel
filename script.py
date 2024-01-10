import pymysql.cursors
from random import randint

# Connect to the database

connection = pymysql.connect(host='localhost', user='root', password='', database='blogdb', cursorclass=pymysql.cursors.DictCursor)

with connection:
    with connection.cursor() as cursor:

        sql = "INSERT INTO `admins` (`user_id`) VALUES (%s)"
        cursor.execute(sql, ('1'))


    connection.commit()