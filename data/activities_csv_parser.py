#Trasforma Csv in un File Latex riutilizzabile
#(lista con testo html e url già costruito per Latex
#
# References
#   https://docs.python.org/3/library/csv.html
#   http://2017.compciv.org/guide/topics/python-standard-library/csv.html

# File di output
filelatex = open('Latex_activities.tex', 'w')
filelatex.write('\\documentclass{article}\n\\usepackage{hyperref}\n\\begin{document}')
#filehtml = open('Html_attivita.txt', 'w')
DEBUG = 0


# Funzione List of Record to Latex
def listrecordtolatex( listrecord ):
	"DocString"
	line_count = 0
	filelatex.write("\n\n \\begin{itemize}\n")
	for row in listrecord:
		line_count += 1
		#if row['Period']=="II Year":
		filelatex.write("\item\n")
		filelatex.write("\t%s: \href{%s}\n\t{\emph{%s}},\n" % (row["Type"],row['Url'],row['Event_Title']))
		filelatex.write("\t(Prof: %s),\n" % (row["Organizers_Speakers"]))
		filelatex.write("\t%s, %s, %s, %s;\n\n" % (row['Approx_Date'],row['Organization'],row['Location'],row['Country']))
	filelatex.write("\end{itemize}\n")
	print(line_count)
	return

def listrecordtolatex_noprof( record ):
	"DocString"
	line_count = 0
	filelatex.write("\n\n\\begin{itemize}\n")
	for row in listrecord:
		line_count += 1
		#if row['Period']=="II Year":
		filelatex.write("\item\n")
		filelatex.write("\t%s: \href{%s}\n\t{\emph{%s}},\n" % (row["Type"],row['Url'],row['Event_Title']))
		#filelatex.write("\t(Prof: %s),\n" % (row["Organizers_Speakers"]))
		filelatex.write("\t%s, %s, %s, %s;\n\n" % (row['Approx_Date'],row['Organization'],row['Location'],row['Country']))
	filelatex.write("\end{itemize}\n")
	print(line_count)
	return

def checkworkshop( str ):
	return str == 'Workshop' or str == 'Conference'

def checkcourses( str ):
	return str == 'Ph.D. Course' or str == 'Master Course'

def checkcommunications( str ):
	return str == 'Workshop' or str == 'Conference'

def checkothers( str ):
	return str == 'Workshop' or str == 'Conference'

conferences_tuple = ('Workshop', 'Conference')
courses_tuple = ('Ph.D. Course', 'Master Course', 'School', 'Training Course')
talks_tuple = ('Invited Talk', 'Contributed Talk', 'Poster')
others_tuple = ('Teaching', 'Certificate', 'Preprint', 'Publication', 'Other', 'Type', 'Seminar')

from datetime import datetime
def antichronosort(list_to_be_sorted):
	return sorted(list_to_be_sorted, key=lambda k: datetime.strptime( k['Start_Date'], '%d-%b-%y'), reverse=True)


import csv
with open('activities.csv', newline='') as csvfile:
	csv_reader = csv.DictReader(csvfile, delimiter=';', quotechar='|')

	#Deserializzo il fileReader in una lista di records (dictionaries)
	records = list(csv_reader)

print("HEADER: "+", ".join(records[0])+"\n")

workshops= antichronosort(list(filter(lambda row: row['Type'] in conferences_tuple,records)))
courses= antichronosort(list(filter(lambda row: row['Type'] in courses_tuple,records)))
talks= antichronosort(list(filter(lambda row: row['Type'] in talks_tuple,records)))
others= antichronosort(list(filter(lambda row: row['Type'] in others_tuple,records)))

#CHECK: missed items
print('missing item ?')
print([item['Type'] for item in records if item not in workshops+courses+talks+others])


print('\n Workshops')
filelatex.write('\n\\section{workshop}\n')
listrecordtolatex(workshops)

print('\n courses')
filelatex.write('\n\\section{courses}\n')
listrecordtolatex(courses)

print('\n talks')
filelatex.write('\n\\section{talks}\n')
listrecordtolatex(talks)

print('\n others')
filelatex.write('\n\\section{others}\n')
listrecordtolatex(others)

filelatex.write('\\end{document}')
filelatex.close()
#filehtml.close()
