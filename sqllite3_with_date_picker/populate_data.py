import csv ,sqlite3 ,codecs
ifile  = open('all_data.csv', "rb")

connection = sqlite3.connect('hedgefund_data.db')
cursor=connection.cursor()
cmd1 = """ CREATE TABLE IF NOT EXISTS 
hedge_fund_data(Fund TEXT,Date TEXT, Direction TEXT, Ticker TEXT, Cusip TEXT,Company Text , ETF_per TEXT) """
read = csv.reader(codecs.iterdecode(ifile, 'utf-8'))
cursor.execute(cmd1)
for row in read :
    if row[0]=="Fund":
        pass
    else:
        print(row)
        cursor.execute("INSERT OR REPLACE INTO hedge_fund_data(Fund,Date,Direction,Ticker,Cusip,Company,ETF_per) VALUES(?,?,?,?,?,?,?);", row) 

ifile.close()
connection.commit()

cursor.execute("SELECT * FROM hedge_fund_data")
results=cursor.fetchall()

for r in results:
    print(r)

connection.close()
