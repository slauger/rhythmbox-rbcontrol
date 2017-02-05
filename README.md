# Rhythmbox Remote Control via HTTP

Fernsteuerung von Rhythmbox ueber Web (PHP). 

Das Webinterface ist angepasst fuer einen iPod Touch bzw. ein iPhone.

## Benoetigte Pakete
```
  - rhythmbox
  - apache2 (oder ein anderer Webserver)
  - php4 oder php5 (als mod_php oder cgi)
  - sudo
```
## Installation
  - PHP Script und HTML/CSS Files irgendwo auf dem Webserver ablegen

  - Mittels "sudo visudo" die Datei /etc/sudoers bearbeiten und folgendes eintragen

    www-data ALL=(ALL) NOPASSWD: /usr/local/bin/rbcontrol

    www-data ist evtl. anzupassen, wenn etwa suexec eingesetzt wird oder ein anderer
    Webserver als Apache2 benutz wird.

  - rbcontrol.sh oeffnen und den Benutzernamen anpassen, unter dem der Rhythmbox
    Player laueft. Evtl. auch noch das File mit dem aktuellen Titel anpassen, falls
    gewuenscht.

  - Das beiliegende Script rbcontrol.sh nach /usr/local/bin/rbcontrol 
    verschieben und ausfuehrbar machen (chmod +x /usr/local/bin/rbcontrol)

Bei Fragen und Problemen reicht eine E-Mail an simon@lauger.name.
