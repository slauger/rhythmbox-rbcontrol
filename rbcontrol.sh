#!/usr/bin/env bash
# script gw between apache2 <-> rhythmbox-control
# http://blog.simlau.net
# version 1.03

# owner of the rhythmbox main process
USERNAME="simon"

# safe current song in textfile, if wanted
NOWPLAYING=""

# get dbus session from users home directory
if [ ! -d /home/$USERNAME/.dbus/session-bus ]; then
	echo "Error: directory /home/$USERNAME/.dbus/session-bus not found"
	exit 1 
fi

source /home/$USERNAME/.dbus/session-bus/*
export DBUS_SESSION_BUS_ADDRESS

# if it was successfull, then we either print it, or export it or whatever, if we want
if [ "$DBUS_SESSION_BUS_ADDRESS" != "" ]; then
        if [ "$NOWPLAYING" != "" ]; then
               su -c "rhythmbox-client --print-playing > $NOWPLAYING" $USERNAME
        fi
        case "$1" in
                "play") su -c "rhythmbox-client --play" $USERNAME ;;
                "pause") su -c "rhythmbox-client --pause" $USERNAME ;;
                "play-pause") su -c "rhythmbox-client --play-pause" $USERNAME ;;
                "next") su -c "rhythmbox-client --next" $USERNAME ;;
                "previous") su -c "rhythmbox-client --previous" $USERNAME ;;
                "mute") su -c "rhythmbox-client --mute" $USERNAME ;;
                "unmute") su -c "rhythmbox-client --unmute" $USERNAME ;;
                "volume-up") su -c "rhythmbox-client --volume-up" $USERNAME ;;
                "volume-down") su -c "rhythmbox-client --volume-down" $USERNAME ;;
                "print-playing") su -c "rhythmbox-client --print-playing" $USERNAME ;;
		# dissabled for security reasons
                #"set-volume") su -c "rhythmbox-client --set-volume $2" $USERNAME;;
        esac
        exit 0
else
        echo "Error: Couldnt get DBUS_SESSION"
        exit 1
fi
