import csv

filelatex = open('convert.txt', 'w')

with open('activities.csv') as csv_file:
    csv_reader = csv.DictReader(csv_file,delimiter=";")
    line_count = 0
    for row in csv_reader:
        if line_count == 0:
            print("HEADER: "+", ".join(row))
            line_count += 1
        filelatex.write("\item\n")
        filelatex.write("\t%s: \href{%s}\n\t{\emph{%s}},\n" % (row["Type"],row['Url'],row['Event_Title']))
        filelatex.write("\t(Prof: %s),\n" % (row["Organizers_Speakers"]))
        filelatex.write("\t%s, %s, %s, %s;\n\n" % (row['Approx_Date'],row['Organization'],row['Country'],row['Location']))

        line_count += 1
    print("Processed %d lines" %line_count )
