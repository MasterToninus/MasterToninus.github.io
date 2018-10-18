#Trasforma Csv in un File Latex riutilizzabile
#(lista con testo html e url già costruito per Latex
#
# References
#   https://docs.python.org/3/library/csv.html
#   http://2017.compciv.org/guide/topics/python-standard-library/csv.html

# File di output
filelatex = open('Latex_activities.txt', 'w')
#filehtml = open('Html_attivita.txt', 'w')


import csv
with open('activities.csv', newline='') as csvfile:
    csv_reader = csv.DictReader(csvfile, delimiter=';', quotechar='|')

    #Deserializzo il fileReader in una lista di records
    records = list(csv_reader)
    print(type(records))
    print(type(records[1]))
    print(records[1])

    #Nota: se non avessi scorso tutto lo stream a dare la lista avrei potuto ciclare direttamente su filereader
    for row in records:
        if row['Period']=="II Year":
            filelatex.write("\item\n")
            filelatex.write("\t%s: \href{%s}\n\t{\emph{%s}},\n" % (row["Type"],row['Url'],row['Event_Title']))
            filelatex.write("\t(Prof: %s),\n" % (row["Organizers_Speakers"]))
            filelatex.write("\t%s, %s, %s, %s;\n\n" % (row['Approx_Date'],row['Organization'],row['Country'],row['Location']))


filelatex.close()
#filehtml.close()
