import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import sys

#sys.argv = [Subject, To, HTML String]
FROM = 'sbgurneet'
TO = sys.argv[2]
PASSWORD = 'rAndOmEOp!%47'

message = MIMEMultipart('alternative')
message['Subject'] = sys.argv[1]
message['From'] = FROM
message['To'] = TO

message.attach(MIMEText(open(sys.argv[3], 'r').read(), 'html'))

server = smtplib.SMTP('smtp.gmail.com', 587)
server.starttls()
server.login(FROM, PASSWORD)
server.sendmail(FROM, TO, message.as_string())
server.quit()
