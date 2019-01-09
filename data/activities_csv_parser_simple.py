#Trasforma Csv in un File Latex riutilizzabile
#(lista con testo html e url già costruito per Latex
#
# References
#   https://docs.python.org/3/library/csv.html
#   http://2017.compciv.org/guide/topics/python-standard-library/csv.html

# File di output
filelatex = open('Latex_activities.txt', 'w')

DEBUG = 0


# Funzione Record to Latex
def recordtolatex( record ):
	"DocString"
	filelatex.write("\item\n")
	filelatex.write("\t%s: \href{%s}\n\t{\emph{%s}},\n" % (row["Type"],row['Url'],row['Event_Title']))
	filelatex.write("\t(Prof: %s),\n" % (row["Organizers_Speakers"]))
	filelatex.write("\t%s, %s, %s, %s;\n\n" % (row['Approx_Date'],row['Organization'],row['Location'],row['Country']))
	return




import csv
with open('activities.csv', newline='') as csvfile:
	csv_reader = csv.DictReader(csvfile, delimiter=';', quotechar='|')

	#Deserializzo il fileReader in una lista di records (dictionaries)
	records = list(csv_reader)


	#Nota: se non avessi scorso tutto lo stream a dare la lista avrei potuto ciclare direttamente su filereader
	line_count = 0
	for row in records:
		if line_count == 0:
			print("HEADER: "+", ".join(row))
		line_count += 1
		#if row['Period']=="II Year":
		recordtolatex(row)
		line_count += 1
print("Processed %d lines" %line_count )

filelatex.close()
