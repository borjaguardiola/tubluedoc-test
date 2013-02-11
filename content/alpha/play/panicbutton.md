# Raspberry Pi Panic Button

This example uses the Raspberry Pi (single board computer) to create a 'panic button' appliance using the BlueVia APIs. When the button is pressed, the software will create a conference object and call multiple participants (mobile or landline) to connect them in. Pressing the button again hangs up the calls.

With some simple hardware modifications to the Pi, we can add a switch and LED via the hardware interface (known as the GPIO):


![Alt text](/img/panic.jpg)


This is the most simple approach to hardware interfacing on the Pi, but please bear in mind that connecting directly to the GPIO pins means you are connected directly to the processor lines, and it is possible to pull too much current and burn out your Pi!  If you are going to experiment extensively, a better approach is an add-on I/O board, such as the *'Slice of PI/O'* from Ciseco (<http://www.ciseco.co.uk>).

This simple interface draws a moderate amount of current for the LED (below 10mA). The switch relies on the fact that the GPIO 0 port already has an on-board pull-up resistor inside the Pi.

To talk to the switch and LED we use some interface code from Dom & Gert's GPIO utility: <http://elinux.org/RPi_Low-level_peripherals>.  This source has been embedded into two 'C' utilities *setled* and *checkswitch*.  We did this because the program that speaks to the GPIO needs to have root privileges, so we can allow these utilities to run as root, and the PHP-based app *piv2.php* can then just run as a normal user app.

**Note:** if you use the Slice of PI/O board, it’s possible to use the I2C commands (see man pages for *i2cset*, *i2cget*) to read switches and set LEDs. This is a pretty civilized way to separate the privileged root functions from the user-space application.

The main app *piv2.php* should be fairly easy to follow.  It uses *Curl* functions to access the GET, POST functions to create HTTP API messages. It also uses the *'exec'* function to execute the external *'C'* utilities setled and checkswitch. 

Semantics are:

*setled on*

Or
 
*setled off*

and *checkswitch* returns the string *'ON'* or *'OFF'* to give you the switch reading.

The conference features are controlled using the RESTful API,  with the code building the necessary JSON messages to access the features. The code loops waiting for a button-press, whereupon it performs a POST to create the conference object.  Variables *$anumber* and *$bnumber* hold the phone numbers of two participants; you could add more if you choose. 

One the initial call is issued, the session ID (*$session*) is known, and this is used with GET to obtain the connected state of the conference (via polling). Once connected, the loop is now checking for the switch to go off in order to issue the hangup command. The *'setled'* command is used to flash the LED while the call is going out, and set it on solid once the call is underway.

Note: there's also some code here to read conference status events via ZeroMQ. It’s commented out in this version, but in principle you can also get talker indications via this API (and light more LEDs maybe?).

## Prerequistites

You will need to install PHP5 on the Pi to run this example (*apt-get install php5-dev*).

In addition, the *setled* and *checkswitch* commands need to be built (*make setled* and *make checkswitch*). Also these commands need root privilege (*setuid*), so do this:

*sudo chmod u+s setled*
*sudo chown root setled*

and the same for *checkswitch*.

If you want to use the ZeroMQ events, you will need to build ZeroMQ for the Raspberry Pi (see  <http://www.zeromq.org/distro:debian>) and also the PHP language bindings (see <http://www.zeromq.org/bindings:php>, *'Build from Github'*).


[Back - BBC Newsreader][Play News Reader]


[Play News Reader]: /alpha/play/