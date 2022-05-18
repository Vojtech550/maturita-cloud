## Virtuální stroj na AWS

### EC2 Amazon Elastic Compute Cloud

Je virtuální server, na kterém běží instance služeb. Např. v našem cvičení vytvoření instance virtuálního stroje na bázi Linuxu (distribuce od Amazonu). Ve výchozím nastavení používá u všech služeb veřejnou IP adresu, která se po každém spuštění služby **mění**.

Zde lze podotknout, že máme privátní IP adresu (IPv4, nebo IPv6, podle toho, kterou nám AWS přiřadí). Pokud bychom chtěli veřejnou (dynamickou)/Elastic IP adresu, za ní si musíme připlatit.

- **Veřejná IP adresa** = Zmizí, pokud je naše instance (např. ve webové aplikaci, virtuálního stroje atd.) vymazána, při vytvoření nové instance se změní, proto dynamická. Používá se ve veřejné podsíti, přidružená k privátní adrese instance. Nemůže být přesouvána z instance na instanci.
    - Př.: Používám virtuální stroj A (instance 1), chci adresu použít i na mojí druhou instanci, virtuální stroj B, to ale nejde.

- **Privátní IP adresa** = Používá ve veřejných a soukromých podsítí a uloží se, pokud zastavíme instanci.

- **Elastická IP adresa** = Je statická veřejná IP adresa a platí se za ní, pokud není využívána a zároveň asociována s instancí. Je spojená se soukromou a veřejnou IP adresou instance a může se pohybovat mezi instancemi (přiřazovat).

### Vytvoření virtuálního stroje

První co musíme udělat je na úvodní obrazovce přejít do „Services“ dále „Compute“ vybrat EC2, kliknout na „Instances“ a „Launch instances“.

1. Na obrazovce se nám ukáže spoustu distribucí Linuxu a verzí Windows. K tomu, abychom nezvolili nic placeného **zaškrtneme „Free tier only“**.

![nabídka Launch instances](img/free_tier.png)

2. Poté se zobrazí detaily konfigurace instance, vedle každého pole je kolečko s písmenem „i“, kde je každé pole vysvětlené. 
3. Vše necháme tak jak je a klikneme na „Next“. V nabídce s tagy (Add Tag) si lze označit náš virtuální stroj štítkem. Následuje Configure Security Group, kde nastavujeme port a další nastavení ohledně přístupu do Linuxu:
    - Type (typ portu SSH, TCP..)
    - Protokol (TCP)
    - Port Range (výchozí 22 pro připojení přes protokol SSH)
    - source (definuje IP adresy, které se můžou připojit na danou instanci našeho virtuálního OS pro IPv4 a IPv6)
    - Description (popis)
    - Security Group name (Jméno bezpečnostní skupiny). Můžeme přejmenovat.
4. Po zkontrolování všech údajů klikneme na „Review and Launch“ a „Launch“.

![nabídka Configure Security Group](img/configure_security_group.png)

5. Klikneme na „Next“  a AWS se nás zeptá na vytvoření párů klíčů privátního a veřejného, jelikož máme přístup zabezpečen protokolem SSH.
6. Klikneme na „Choose an existing key pair“ a vybereme „Create a new key“, Type ponecháme na RSA a klíč si pojmenujeme jak chceme. Posledním krokem je „Launch instances“ a „View instances“.

![nabídka vytvoření public/private klíčů](img/nabidka_klice.png)

### Připojení k instanci linuxu přes Putty

Odkaz ke stažení programu Putty: https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html

1. Po nainstalování spustíme program Puttygen, který nám konvertuje náš stažený SSH klíč k instanci Linuxu. Převede ho z formátu „.pem“ do „.ppk“. Soubor s příponou „.pem“ si otevřeme například v aplikaci Notepad ve Windowsu.
2. Zkopírujeme náš klíč do textového souboru a uložíme do formátu „.txt“. P
3. Poté klikneme v Putty Key Generatoru na Load, kde klíč v „.txt“ formátu najdeme a po kliknutí na „Save private key“ a uložíme.
4. Následujícím krokem je program Putty. Do kolonky „Host Name (or IP address)“ zadáme naši Host Name/IP adresu naší instance, ke které se chceme připojit. Přejdeme na do EC2 služby a klikneme na „Instances“.

Pozor!!! Musíme se přepnout na region, ve kterém jsme si instanci vytvořili. Nejbližší datacentrum se nechází ve Frankfurtu v Německu, kde jsem si instanci Linuxu vytovřil. Poté nás zajímá **Public IPv4 DNS**. V kolonce v Putty musíme zadat `ec2-@user`, protože se napojujeme na instanci z uživatelského účtu.

Nezapomeňte, že ve výchozím nastavení máme veřejnou IP adresu, která se po vypnutí a smaže a po jejím opětovném spuštění se změní.

![Obrázek 9 ukázka instance VM Linux na AWS](img/ukazka_instance.png)

![Obrázek 10 Putty ukázka adresy instance](img/adresa_instance.png)

 
1. Přejdeme v Putty na záložku SSH a zvolíme pod kategorií Connection -> SSH -> Auth, kde je „Private Key File Authentication“. 
2. Klikneme na „browse“ a vybereme náš „.ppk“ klíč. Potvrdíme a jsme připojení. 
3. První krok, který můžeme udělat je aktualizovat všechny balíčky pomocí příkazu: `sudo yum update`

Pomocí příkazu `sudo systemctl poweroff` můžeme náš Linux definitivně vypnout, nebo instanci můžeme jednoduše vypnout v AWS panelu „Instances“. Klikneme na „Instance state a „Terminate instance“.

## Navigace:
  - [Cloudové služby obecně](Cloudove_sluzby_obecne.md)
  - [Amazon Web Services - Základní nastavení účtu](AWS_nastaveni.md)
  - [Virtuální stroj v AWS](AWS_navod_VM.md)
  - [Statický web v S3 Bucket](AWS_navod_static_website.md)
  - [Web postavený nad frameworem v EC2](AWS_navod4_CI4_web.md)
  - [Návod zprovoznění CMS Wordpress](AWS_navod_wordpress.md)
  - [Dokumentace](docs/Dokumentace.doc)