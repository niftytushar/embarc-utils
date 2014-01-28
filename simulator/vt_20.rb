require 'socket'
#require 'csv'
require 'nokogiri'

hostname = '117.241.152.36'
port = 21000

count = 1

# parse GPX file using Nokogiri - meaning handsaw
gpx_file = Nokogiri::XML(File.open('data_1.gpx'))
trkpts = gpx_file.css('xmlns|trkpt')

trkpts.each do |trkpt|	
	# current time in UTC
	time = Time.now.utc.strftime "%Y%m%d%H%M%S"
	
	# location from file
	latitude = trkpt.xpath('@lat').to_s.to_f
	longitude = trkpt.xpath('@lon').to_s.to_f

	# data packet
	some_data = "2000000011,#{time},#{longitude},#{latitude},71,25,0,8,0,7,2,0.50,0.60,0,0"
	
	# open a socket connection to the server
	sock = TCPSocket.open(hostname, port)
	
	# send some data
	sock.print(some_data)
	
	# close the connection
	sock.close
	
	# debug
	puts "#{count} sent at #{time}"
	
	count += 1
	
	# wait time
	sleep 1
end

=begin
# reading a CSV file
CSV.foreach("data_2.csv") do |row|	
	# current time in UTC
	time = Time.now.utc.strftime "%Y%m%d%H%M%S"
	
	# location from file
	latitude = row[0]
	longitude = row[1]
	
	# data packet
	some_data = "2000000011,#{time},#{longitude},#{latitude},42,25,0,8,0,7,2,0.50,0.60,0,0"
	
	# open a socket connection to the server
	sock = TCPSocket.open(hostname, port)
	
	# send some data
	sock.print(some_data)
	
	# close the connection
	sock.close
	
	# debug
	puts "#{count} sent at #{time}"
	
	# wait time
	sleep 1
end
=end