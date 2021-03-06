## Web postavený na frameworku s PHP - zprovoznění (CI4)

Každý kdo chce vytvořit dynamický web a použít vlastní framework musí mít nad webem kontrolu. Lightsail je jednodušší služba, ale nemáme nad webem plnou kontrolu. V tomto případě využijeme EC2, kde si všechno nastavíme, budeme také pracovat s CLI (Command Line Interface).

### EC2 – vytvoření instance Linuxu

Vytvoříme si novou instanci EC2. V horní vyhledávací liště napíšeme „EC2“. Zde potom klikneme na „Launch instances“. Pro jistotu zaškrtneme opět „Free tier only“ a první linuxovou distribuci.

![vytváření instance](img/vytvoreni_instance.png)

Čekají nás další kroky, které přeskočíme, kromě „Configure security group“. Pro naše testování nám postačí.

V konfiguraci bezpečnostních skupin můžeme buď vybrat naši existující, již vytvořenou „Security group“, nebo vytvořit novou.

![vyběr skupiny](img/vyber_skupiny.png)

Potom bychom v ní nastavili tyto nové porty, a to https a https. Viz předchozí kapitola, kde je všechno popsané co a k čemu slouží.

***Vytvoření skupiny***

Vybrali bychom „Create a new security group“ a zde již naklikali https a http přesně tak, jak je na obrázku a libovolně si ji pojmenovali.

![vytvoření skupiny](img/vytvoreni_skupiny.png)

Na konci nám stačí zkontrolovat, jestli máme vše vyplněné a „Launch“. Pokud se nás zeptá na vytvoření nového klíče či použít existující, nechám na vás.

**Nesmíme zapomenout si naši instanci pojmenovat**, abychom se vůbec vyznali co na jaké instanci nám běží. V hlavním menu EC2 služby najedeme na jméno instance (buňka s názvem Name, kde jsou pomlčky) na ikonku poznámky jak je vyobrazeno na obrázku.

![pojmenování instance EC2](img/pojmenovani_instance.png)

Vysvětlení jak se připojuje k instanci přes PuTTY je uvedeno v kapitole [Připojení k instanci přes Putty](AWS_navod_VM.md/###Připojení-k-instanci-linuxu-přes-Putty)

Předtím, než začneme s instalací MySQL služby, musíme nastavit elastickou IP adresu, jak již z předchozího návodu, musí být připojena k instanci, jinak za ní budeme platit.

V pravém panelu v kategorii „Network & Security“ zvolíme „Elastic IPs“. Zde klikneme v pravém horním rohu na „Allocate Elastic IP address“.

![allocate Elastic IP address](img/prirazeni_IP.png)

![přiřazení regionu](img/prirazeni_regionu.png)

Po vytvoření opět musíme vybrat naši IP adresu a kliknout na „Actions“ a „Associate Elastic IP address“. Z výběru instancí zvolíme tu, kterou chceme s elastickou IP adresou svázat a zašrkrtneme poslední políčko tak, jak je to na obrázku a kliknem na „Associate“.

![instance elastic IP](img/instance_elastic_IP.png)

Popřípadě můžeme instalovat všechno v jednom pomocí xampp klienta a potom intuitivně nastavovat databázi přes phpMyAdmin.
Použijeme příkaz ke stáhnutí xampp balíčku:

`sudo wget https://www.apachefriends.org/xampp-files/8.1.1/xampp-linux-x64-8.1.1-2-installer.run`

poté můžeme udělat soubor spustitelný pomocí:
```
sudo chmod +x xampp-linux-x64-8.1.1-2-installer.run
Instalaci spustíme příkazem:
sudo ./xampp-linux-x64-8.1.1-2-installer.run
```
Vše v instalaci potvrdíme (buď napíšeme y zmáčkneme enter) a vyčkáme dokud nám nenapíše systém, že je vše nainstalované. Po naisntalování můžeme spustit xampp pomocí příkazu:

`sudo /opt/lampp/lampp start`

![instalace xampp a služba](img/instalace_xampp.png)

Když přejdeme na phpMyAdmin, tak se nám zobrazí stránek s chybovou hláškou, kterou spravíme v httpd-xampp.conf.

![přístup odepřen phpmyadmin](img/pristup_odepren.png)

Tento soubor se nachází ve adresáři extra. Celá celá k souboru je /opt/lampp/etc/extra/httpd-xampp.conf. K editaci si ho můžeme zkopírovat do domovské složky a pak otevřít skrze WinSCP, abychom ho mohli editovat, nebo využít editoru vi/nano, nezapomeňte ho spustit příkazem sudo.
V souboru „httpd-xampp.conf“ označíme část:

„Require local“

**a vložíme místo této části text:**

```
AllowOverride AuthConfig Limit
Order allow,deny
Allow from all
Require all granted
```

Poté stačí restartovat pomocí příkazu: `sudo /opt/lampp/lampp restart`.
V dalším kroku nastavíme heslo k phpMyAdmin.
Příkaz: `sudo /opt/lampp/xampp security`

Poté se stačí řídit příkazy, ale jak se dostanete k otázce:

**"The FTP password for user ‚daemon‘ is still set to ‚xampp‘."**
Napište `no`.

Výchozí uživatel je vždy: root. Heslo je takové, jaké jste si zvolili.
Poté můžeme nastavit databázi intuitivně přes phpmyadmina:

![phpMyAdmin  - vzdáleně](img/phpmyadmin.png)

Předtím, než nahrajete ukázkový web škola mapy je potřeba stáhnout composer, pokud stahujete repozitář z githubu. Odkaz na composer (Windows): https://getcomposer.org/Composer-Setup.exe

Poté stačí přejít do složky v programu `cmd.exe` ve windowsu (zkratka Win + R) a přejít do složky pomocí příkazů `cd cesta_ke_složce`. Až budete ve složce skola-mapy v cmd programu, napište: `composer update --no-dev`. 

GitHub maže některé soubory, které jsou potřeba k správné funkčnosti frameworku.

Přes WinSCP můžeme nahrát náš web do domovského adresáře a přesunout ho přes příkaz do /opt/lampp/htdocs složky:

`sudo mv skola-mapy /opt/lampp/htdocs`

Poté musíme přidat oprávnění (v mém případě složka s webem skola-mapy).
Pokud jsme neměnili nic v nastavení, hlavní httpd je „daemon“, jinak bychom museli napsat:
`ps aux | grep httpd
sudo chown -R daemon /opt/lampp/htdocs/skola-mapy`
Vše je teď hotové, stačí nám už jen spustit web.

**Pokud využíváte jinou distribuci, než distribuce Amazon:** (např. Ubuntu)

Pokud by web nešel spustit, je potřeba povolit v souboru `/opt/lampp/etc/php.ini` povolit následující rozšíření např.:
změňte `;extension=intl` na `extension=intl`, naleznete je zde: https://onlinewebtutorblog.com/codeigniter-4/codeigniter-4-system-requirements/
přes příkaz `sudo nano /opt/lapp/etc/php.ini` můžete editovat.

![web ukázka](img/web_ukazka.png)

**Spuštění xampp po startu pro Amazon distribuci**

Běžně Linux nepovoluje automatické spuštění po startu aplikacím třetí strany. Toto musí správce sám povolit. Tato metoda běžně funguje pro Red-Hat a další distribuce. Zde je návod i pro Ubuntu distribuci: [zde klikněte](http://www.facweb.iitkgp.ac.in/dashboard/docs/auto-start-xampp.html)
1. Prvně musíme zkopírovat */opt/lampp/lampp* do */etc/init.d*
   * `sudo cp /opt/lampp/lampp /etc/init.d`
2. Poté musíme přidat do chkconfig tyto unformace
   * `chkconfig: 2345 80 30`
3. Poté musíme zadat příkaz:
   * `sudo chkconfig --add lampp`
4. Pro vrácení změn zpátky stačí smazat soubor *lampp* z */etc/inid.d* složky a zadat příkaz
   * `sudo chkconfig --del lampp`


### Certificate Manager (Zajištění SSL certifikátu)
Chceme-li mít naše připojení zabezpečené a šifrované, využijeme služby Certificate Manager, který nám umožní vytvořit SSL certifikát pro naši webovou stránku, který zabezpečuje připojení mezi transportní a aplikační vrstvou.

Místo adresy http://www.myawswp.ml budeme mít zabezpečenou adresu https://www.myawswp.ml, takže náš prohlížeč nebude hlásit, že je připojení nezabezpečené. Zároveň SSL certifikát musí být připojený k jedné službě ať už je to Load balancer, CloudFront či další vhodné.

Předtím než začneme, odkazuji na tutoriál „Doména webové stránky (přes DNS freenom.com)“, kde mám popsanou část se službou Route53 a přístup k webu ať už uživatel napíše adresu s předponou „www“, nebo bez. Část s vlastní DNS freenom můžeme vynechat, pokud nechceme vlastní doménu. Ale vytvoření „hosted zone“ je povinné.

V rámci free tieru si vybereme Load balancer, který rozprostře zátěž na ostatní datové linky. Pokud bude jeden server zatížený, tak Load balancer rozprostře požadavky na server po ostatních vytvořených serverech, ke kterým se dostanu. V případě nefunkčnosti server odpojí z provozu.

1. Najdeme si službu Certificate Manager. 
2. Vybereme „Request a certificate“ a zvolíme „Request a public certificate“.
3. V „Domain names“ napíšeme naši webovou stránku, pro mě již vytvořená „myawswp.ml“ „www.myawswp.ml“, jelikož pokud chceme udělat web přístupný pod kterýmkoliv formátem, který uživatel zadá, musíme přidat 2 adresy do certifikátu. V Lightsail toto vše bylo řešeno pouze pár příkazy, v EC2 máme nad tím plnou kontrolu.

![certifikát - doména](img/certifikat_domena.png)

V dalším kroku se Amazon musí ujistit, že jsme vlastníky domény. Zvolíme první možnost a dole „request“. **Stránku nezavírejte!**

![certifikát - čekání na ověření](img/overeni.png)

Rozklikneme Certificate ID našeho certifikátu a v Domains máme CNAME name a CNAME value record, který přidáme do Route53 -> Hosted zones -> naše doména. Vytvoříme nový „Record Set“. Vrátíme se zpátky na náš certifikát a zkopírujeme CNAME name, který potom vložíme do záznamu, který tvoříme v „Record name“. **Smažeme na konci naši doménu, kterou již máme vytvořenou**. „Record type“ navolíme CNAME a „Value“ zkopírujeme opět z našeho certifikátu a vložíme a vytvoříme záznam.

![záznam typu CNAME](img/cname.png)

![výsledek – jak mají vypadat záznamy (DNS + certifikát ověření)](img/vysledek_tabulka.png)

Vyčkáme asi kolem 3-5 minut (může trvat i déle, ale 3-5 minut je obvyklá doba, než Amazon vše ověří a vytvoří nám SSL certifikát. Po opětovném načtení stránky se nám ve statusu objeví „Issued“. V další fázi vytvoříme Load Balancer, ke kterému napojíme právě náš SSL certifikát.

![ověřené záznamy k certifikátu „CNAME records“](img/overene_zaznamy.png)

***Load-Balancer – připojení certifikátu k instanci Linuxu***
V rámci služby EC2 je load balancer zdarma na který se musí vázat (nebo k jiné službě), ten potřebujeme k SSL certifikátu. 

V konzoli napíšeme „Load Balancer“ a dole v kategorii „Features“ najdeme „Load Balancers“ pro Lightsail. Klineme na „Create load balancer“ a vybereme „Application load balancer“. Load Balancer si můžeme libovolně pojmenovat.

***Nastavení load balanceru***

**Název** – zvolíme si libovolný název

**Network mapping** - zde musíme vybrat zóny, kde jsme si vytvořili náš web. Zjistíme v hlavním výběru instancí v EC2 službě v „availability Zone“. Musíme zvolit minimálně 2 zóny.

![availability Zone](img/availability_zone.png)

**Listeners and Routing** – zde přidáme kromě protokolu „http“ i „https“.
-	V „Listeners and Routing klikneme v „http“ protokolu na „Create target group“. Pokud budeme chtít pouze přesměrovávat na https, **postačí nám vytvořit skupinu pro https s portem 443 místo portu 80.**

![listener port 80](img/listener_port_80.png)

**Create target group name**
-	„Target type“ musí být „Instances“
-	„Target group name“ si pojmenujeme jak budeme chtít
-	Dále zde máme výběr instancí k připojení ke skupině, vybereme naši instanci a klikneme „include as pending below“ a vytvoříme skupinu.

![přiřazení instance k target group](img/prirazeni_instance.png)

Přejdeme zpátky k load balanceru a klikenme v „http listeneru“ na tlačítko „refresh“ a zvolíme nově vytvořenou skupinu.

![tlačítko refresh](img/tlacitko_refresh.png)

**Stejný krok musíme opakovat i pro listener https čili vytvořit další skupinu, tentokrát s portem 443 (https).**

**Secure listener settings -> Default SSL Certificate – zde vybereme náš certifikát**

![vyběr SSL certifikátu](img/vyber_certifikatu.png)

Security groups – vybere skupinu, kde máme nastavené protokoly: https, https
Vytvoříme load balancer. A zkopírujeme „DNS name“. V route53 pod naším webem vytvoříme záznam typu „A record“. Můžeme smazat A recordy s „www“ i bez www, abychom zde vložili náš nový A record s load balancerem. Přes něj poté budeme přesměrovávat http na https. Vytvoříme stejný record i s „www“.
Route Traffic to – Zde vybereme Alias a v políčkách bude (jak jde za sebou)
1.	Alias to Application and Classic Load Balancer.
2.	Region, ve kterém se nachází náš load balancer
3.	Výběr load balanceru

![nastavení load balanceru v Route53](img/load_balancer.png)

![load balancer - DNS name record](img/DNS_record.png)

Jak vypadá route tabulka v Route53 po nasazení SSL certifikátu, nastavení DNS domény, nastavení adresy (funkčnost s „www“ příponou i bez).

![nastavení Route53 web: ci4webcz.ml](img/nastaveni_route53.png)

***Přesměrování na https***

Stačí přejít do Load Balancers -> Listeners kliknout na http listener a kliknout na „Edit“. Poté stačí změnit skupinu na tu, kterou jsme si vytvořili pro https protokol.

Ve „View/edit rules“ se dají přidávat libovolná pravidla s „if“ podmínkou.

![listener editace](img/listener_editace.png)

![listener přesměrování](img/listener_presmerovani.png)

Ve složce htdocs ve složce /opt/lampp/htdocs/ soubor „index.php“ upravíme podle složky našeho webu.

`Header ('Location: ' ‚.$uri.‘/název složky webu/‘);`

## Navigace:
  - [Cloudové služby obecně](Cloudove_sluzby_obecne.md)
  - [Amazon Web Services - Základní nastavení účtu](AWS_nastaveni.md)
  - [Virtuální stroj v AWS](AWS_navod_VM.md)
  - [Statický web v S3 Bucket](AWS_navod_static_website.md)
  - [Web postavený nad frameworkem v EC2](AWS_navod4_CI4_web.md)
  - [Návod zprovoznění CMS Wordpress](AWS_navod_wordpress.md)
  - [Dokumentace](docs/Dokumentace.doc)