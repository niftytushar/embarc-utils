require 'rubygems'
require 'daemons'

# Become a daemon
Daemons.daemonize

loop do
	system("php /var/www/embarc-utils/php/schedules.php")
	sleep(3600) # wait for 1 hour after sending a mail
end

# Contributions
#
# Daemons
# Installation: gem install daemons
# URL: http://daemons.rubyforge.org/