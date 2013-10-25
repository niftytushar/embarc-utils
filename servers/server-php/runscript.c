/*
* Execute bash script as root user
* 
* Note: Apply appropriate permissions to the compiled file of this code
* chown root:root <filename>
* chmod 4755 <filename>
*
* Compilation Instructions:
* gcc runscript.c -o <filename>
*/

#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
#include <string.h>

int main(int argc, char *argv[])
{
   setuid( 0 );
   char command[100] = strcat("cat /root/findnsecure/", &argv[1]);
   printf("%s", command);
   system( "cat /root/findnsecure/" );

   return 0;
}
