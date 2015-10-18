1. Download en installeer [VirtualBox](www.virtualbox.org/wiki/Downloads)
2. Download en installeer [Vagrant](www.vagrantup.com)
3. Haal voor het zeker een oude vagrant configuratie weg. (Misschien bestaat dit bij jou niet)
   - Ga naar `C:\Repos`
   - delete `Vagrantfile`
   - delete `.vagrant` directory
4. Installeer homestead:
   - open de command prompt "cmd"
   - `cd \Repos`
   - Verplaats het verlanglijstjes project naar een nieuwe submap `code`. Dit is nodig voor homestead.
   
     ```
	 mkdir code
	 move /y verlanglijstjes code
	 ```
	 
   - `vagrant box add laravel/homestead`
      (nu wordt homestead gedownload en geinstalleerd) (duurde bij mij 4 minuten)
   - `composer global require "laravel/homestead=*"`
   - `git clone https://github.com/laravel/homestead.git .` (let op, die punt op het eind is belangrijk, dat betekent "in de huidige folder")
   - Maak dan een `.homestead` directory aan en kopieer daar drie bestanden heen:
      
	 > Let op: vervang overal 'jouw-windows-username' in dit document met je windows username
	 
     ```
	 mkdir C:\Users\jouw-windows-username\.homestead
	 copy /y src\stubs\Homestead.yaml C:\Users\jouw-windows-username\.homestead\Homestead.yaml
	 copy /y src\stubs\after.sh C:\Users\jouw-windows-username\.homestead\after.sh
	 copy /y src\stubs\aliases C:\Users\jouw-windows-username\.homestead\aliases
	 ```
5. Maak dan (nog steeds in command prompt) een ssh key aan om met je virtuele machine te kunnen verbinden.
   - `ssh-keygen -t rsa -C "lieselot@homestead"`
   - Dan word je gevraagd waar het opgeslagen moet worden. Type: `C:\Users\jouw-windows-username\.ssh\homestead_rsa`
   - Dan 2x Enter om een lege passphrase in te voeren.
6. Bewerk de virtuele machine instellingen
   - Ga in windows explorer naar `C:\Users\jouw-windows-username\.homestead`
   - bewerk `Homestead.yaml` en vervang het hele document hiermee:

	```
	---
	ip: "192.168.10.10"
	memory: 2048
	cpus: 1
	provider: virtualbox

	authorize: ~/.ssh/homestead_rsa.pub

	keys:
		- ~/.ssh/homestead_rsa

	folders:
		- map: C:\Repos\code
		  to: /home/vagrant/code

	sites:
		- map: verlanglijstjes.dev
		  to: /home/vagrant/code/verlanglijstjes/public

	databases:
		- homestead

	variables:
		- key: APP_ENV
		  value: local

	# blackfire:
	#     - id: foo
	#       token: bar
	#       client-id: foo
	#       client-token: bar

	# ports:
	#     - send: 93000
	#       to: 9300
	#     - send: 7777
	#       to: 777
	#       protocol: udp
	```
   
7. Je ziet dat homestead ip 192.168.10.10 gebruikt, dus dat ip moet je nu in je hosts bestand gebruiken voor verlanglijstjes.dev   
   
   ```
   192.168.10.10   verlanglijstjes.dev
   ```
   
8. weer in cmd type: `homestead up` om de server te installeren en starten.
   - `vagrant up` start de server. Alleen de eerste keer installeert ie ook heel veel, de volgende keren gaat het gewoon snel.
   - `vagrant halt` sluit de server af
   
9. Omdat we nu een virtuele machine gebruiken moet je nog een keer de database inlezen. Homestead heeft geen phpmyadmin, dus je moet een database programma installeren.
   - Download en installeer [Toad for Mysql](http://software.dell.com/products/toad-for-mysql/)
   - Voor dit in voor de connectie
     ```
	 Connection type: TCP
	 Host: 127.0.0.1
	 User: homestead
	 Password: secret
	 Database: homestead
	 Port: 33060
	 
	 Name: homestead
	 Category: Development
	 
	 Save password: yes
	 ```
	 Klik dan op `Save` en `Connect`
   - Open het database dump bestand `verlanglijstjes-dump.sql`
   - Druk op `F5` om alles uit te voeren. (Ik kreeg een pop-up met een bind-variable vraag. Druk gewoon op ok.)
   
10. Check in je browser `http://verlanglijstjes.dev/`