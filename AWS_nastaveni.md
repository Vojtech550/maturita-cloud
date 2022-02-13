# 2 AMAZON WEB SERVICES (AWS)

Amazon Web Services je podle definice Amazonu „bezpečná výpočetní platforma, která poskytuje výpočetní výkon, databáze, propojování mezi sítěmi, a disky pro uložení dat.“

AWS je celosvětově využívaná veřejná cloudová služba nejen v zahraničí, ale i u nás, v České republice. Přední zákazníci u nás jsou například Innogy, social bakers, sli.do v zahraničí

AWS nabízí až 24 regionů _**(vložit obrázek)**_, kdy každý region je nezávislý a je propojen vysokorychlostní optickými kabely. Nabízí více než 158 Edge locations , aby poskytly co nejnižší latenci, 77 Availability zones  ve více než 250 zemích světa, kde v každé zóně má 2 a více datacenter.

## 2.1 Placení

Amazon Web Services využívá, stejně jako ostatní cloudy, pay-as-you-go model, známý také jako Pay Per Usage nebo Pay-As-You-Use. Tento model je založen na předplatném a spotřebě. Platí se za délku používání služby, zdrojů (HW – RAM, CPU, GPU atd.), množství uložených dat na disku, a odchozí přenos dat.

## 2.2 Zakládání a správa účtu

Začneme tím, že přejdeme na webovou stránku https://aws.amazon.com/ a klikneme v pravém horním rohu na  „Create an AWS Account“. Pokud jsme se již někdy přihlásili, vypíše se místo toho „Sign In to the Console“.

Zadáme informace a klikneme na „Continue“. Pozor! Pokud zadáme špatné informace, tedy emailovou adresu, tak se nebudeme moci k našemu AWS účtu dostat. Zvolíme „Personal“ účet a poté se nás zeptá na nějaké naše informace, které vyplníme. A pak už jen „Create Account and Continue“. Poté stačit ověřit email a potvrdit účet v emailové schránce. Vytvořili jsme si free účet, kde máme 750 hodin služeb v provozu zdarma. Pro naše účely je ale dostačující.

Přejdeme do nastavení našeho účtu a vložíme informace o naší kreditní kartě, které jsou k využívání služeb potřeba. Bez předem dané platební metody nám Amazon neumožní využívání služeb. Na stránce „Payment Information“, v levém menu, přidáme naši kreditní kartu, ze které strhnou $1 USD (americký dolar) k ověření, zda účet existuje. Peníze se vám vrátí během tří až pěti pracovních dnů.

Poznámka: Částka, která se strhává se může lišit v závislosti na kurzu měn.

### 2.2.1 Ověřovací metoda 

### 2.2.2 Doplňkové zabezpečení MFA (Multi Factor Authentication) 

### 2.2.3 Billing alarm **(přidat obrázky)**

Jedna z velice důležitých věcí, na kterou bychom neměli zapomenout je hlídat stav našeho účtu a kolik peněz si Amazon účtuje. Tuto funkci splňuje služba, která je zdarma a je v nastavení účtu. V rámci kurzu, který má většinu našich služeb zdarma po dobu provozu 750 hodin se nemusíme obávat, že by nám Amazon strhával peníze. K tomuto účelu je tu Billing alarm, který nás upozorní, pokud překročíme hranici kterou si nastavíme.

V horní liště na vyhledávání napíšeme „Billing“, poté přejdeme do nabídky „Billing preferences“. Jsou zde 3 možnosti, ale my budeme využívat poslední jen poslední 2. První pošle fakturu emailem, obvykle během tří dnů na začátku měsíce. Druhá nám bude posílat upozornění na email, který zadáme a třetí bude monitorovat průběh využívání služeb a jejich vyúčtování (nejde deaktivovat). Klikneme na „Save preferences“. Další nastavení Billing alarmu se jich nachází CloudWatch službě.

### 2.2.4 Služba CloudWatch **(přidat obrázky)**

V horní nabídce „Services“ pod kategorií „Management & Governance“ se nachází služba CloudWatch, který, který nám monitoruje dobu využívání služeb v provozu a využité zdroje (CPU, RAM a další). K tomuto účelu využívá i grafy, na kterých je vše přehledně vidět.

Jedná se o jednu z regionálních služeb čili funguje na úrovni regionu, kde ji nastavíme. V pravém horním rohu musíme vždy **vybrat US East (N. Virginia), co se týče placení.** V levé nabídce potom zvolíme v pořadí z leva do prava: Alarms – Create alarm – Select metric – Billing – Total Estimated Charge – Select metric.

Dole máme Treshold type, „Whenever Estimated Charges is… a than… do posledního políčka vložíme částku v amerických dolarech. Upozorní nás, že pokud překročíme částku např. $5, tak dostaneme notifikaci na náš email (služba Billing Alarm). Klikneme na „next“. Použijeme „Create new topic“ a libovolně si ho pojmenujete, např. „Billing_Notification“. Potom se můžeme podívat do SNS Console a tam už vidíme všechny informace.

![Obrázek 1 Billing notification](img/billing_notification.png)

## 2.3 AWS Identity and Access Management Service (IAM)

### 2.3.1 Vytváření skupiny

Přihlásili jsme se pod root  účtem, který má všechna práva k účtu. Kdyby se nám sem ale někdo cizí dostal, mohl by ukrást naše citlivé údaje. K tomu potřebujeme vytvořit uživatele, pod kterým se budeme přihlašovat a zároveň nebude mít přístup k citlivým údajům. A taky si zde usnadníme přihlašování.

Začneme vytvořením skupiny, které přiřadíme práva a následně uděláme uživatele využijeme IAM. Přejdeme d Services, poté Security, v kategorii „Identity & Compliance je služba „IAM“.

Přejdeme do pravého panelu a v „User Groups“ vytvoříme naši skupinu „Create Group“. Pojmenujeme si ji například „Admins“. Dole máme pravidla, tedy oprávnění pro skupiny (Permissions policies). Do vyhledávacího pole napíšeme „AdministratorAccess“, které zaškrtneme. Všechna práva jsou psána v JSONu . V obrázku níže je vidět jednoduchý skript, ve kterém máme vše hlavní zpřístupněno.

![Obrázek 2 ukázka JSONu](img/json.png)

### 2.3.2 Změna ID na jméno

Přihlašování do konzole pro námi vytvořeného uživatele za pomocí identifikačního čísla nebude nejjednodušší. Změníme ho na jméno. V IAM službě se toto dá nastavit. Využijeme Account Allias funkce, která je ve výchozím nastavení pod naším ID účtu (Account ID) na něco víc „user friendly“. Pojmenujeme si ho a uložíme změny.

![Obrázek 3 IAM úvodní obrazovka](img/IAM_uvodni_obrazovka.png)

![Obrázek 4 alias pro budoucího uživatele](img/alias.png)

### 2.3.3 Vytváření uživatele

Přejdeme opět do IAM služby a v pravé liště klikneme na „Users“, poté „Add User“. V „Select AWS access type“. Zvolíme „Password – AWS Management Console Access“. Poslední možnost odklikneme, pokud nechceme znovu vytvářet heslo a nechceme, aby uživatel dostal práva si znovu vytvořit heslo. Klikneme na „Next“. Zde můžeme uživatelům přiřazovat práva, stejně jak u skupiny. Zatrhneme skupinu, kterou jsme si vytvořili. Práva je lepší přiřazovat skupině, necháme výchozí nastavení. Další 2 způsoby jsou popsané níže.

Copy permissions from existing user – zkopíruje práva od jiného uživatele.
Attach existing policies directly - tato možnost není doporučována, protože snazším způsobem je přiřazovat práva skupině, ke které je uživatel přiřazen.

V dalším okénku jsou tagy, které pro nás nejsou důležité. Tags - Tyto štítky nejsou důležité. Ovšem, pokud chcete dále uživateli upravovat oprávnění, nebo k čemu má mít přístup, tak se dají nastavit. Ty ale pro nás nejsou důležité.

![Obrázek 5 úspěšné vytvoření uživatele](img/image6.png)

Po kliknutí na „Create User“ máme našeho uživatele vytvořeného. A pomocí odkazu, který je v zeleném rámečku se můžeme přihlásit. V první kolonce napíšeme naše přístupové jméno/ID do konzole, proto jsme si ho měnili na jméno, jelikož je praktičtější. „IAM user name“ je naše jméno, podjkterým jsme si vytvořili nového uživatele a zařadili do skupiny admins pod naším root účtem. A nakonec heslo uživatele.

Pod naším uživatelem, jako k jediné informaci, ke které nemůžeme přistoupit je „billing“, tedy fakturační údaje (osobní údaje + kreditní karta).

## 2.4	Virtuální stroj na AWS

### 2.4.1 EC2 Amazon Elastic Compute Cloud

Je virtuální server, na kterém běží instance služeb. Např. v našem cvičení vytvoření instance virtuálního stroje na bázi Linuxu (distribuce od Amazonu). Ve výchozím nastavení používá u všech služeb veřejnou IP adresu, která se po každém spuštění služby **mění**.

Zde lze podotknout, že máme privátní IP adresu (IPv4, nebo IPv6, podle toho, kterou nám AWS přiřadí.) Pokud bychom chtěli veřejnou (dynamickou)/Elastic IP adresu, za ní si musíme připlatit.

- **Veřejná IP adresa** = zmizí, pokud je naše instance (např. webové aplikaci, virtuálního stroje atd.) vymazána, při vytvoření nové instance se změní, proto dynamická. Používá se ve veřejné podsíti, přidružená k privátní adrese instance. Nemůže být přesouvána z instance na instanci. Př.: Používám virtuální stroj A (instance 1), chci adresu použít i na mojí druhou instanci, virtuální stroj B, to ale nejde.

- **Privátní IP adresa** = používá ve veřejných a soukromých podsítí a uloží se, pokud zastavíme instanci.

- **Elastická IP adresa** = je statická veřejná IP adresa a platí se za ní, pokud není využívána a zároveň asociována s instancí. Je spojená se soukromou IP adresou instance a může se pohybovat mezi instancemi. Vložit obrázek