#! /usr/bin/ python

import sqlite3

db = sqlite3.connect('/root/PythonScripts/PoCDB.db')


cursor = db.cursor()
cursor.execute('''Update ipv6_hosts set fakeRAStatus = 0''')

db.commit()
db.close()
