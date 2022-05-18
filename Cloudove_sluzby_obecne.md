# Seznámení s cloudem

## Definice a příklad z praxe

Na internetu je spousta definic vztahující se ke cloudovým službám, Ve zkrácené podobě znamená, že zprostředkovává a distribuuje výpočetní služby přes internet.

Jedním z příkladů aplikace na cloudové službě je provozovat aplikaci určenou ke komunikaci podobnou messengeru, kterou vlastní firma Facebook. K tomu, abychom ji mohli provozovat na světové úrovni bychom potřebovali prostředky, které by nám to umožnili. Jedním z nich jsou cloudové služby, kde si můžeme alokovat výkon podle požadavků na aplikaci. Jedním z typických plusů cloudových služeb jsou náklady, agilita čili přizpůsobení se daným požadavkům aplikace a rychlé nasazení.

- **Cloud (Cloud computing)** = v oblasti cloudových služeb se označují IT služby dostupné z internetu. Toto zahrnuje celosvětovou dostupnost prostředků hardwarových tak i softwarových.

## Dělení cloudových služeb

###	Dělení podle cloudových řešení (Deployment Models)

**Private (soukromý) cloud**
  - Jde o cloudové řešení využívané a vlastněné pouze jedinou organizací zahrnující více spotřebitelů. Výpočetní infrastruktura je obvykle vlastněna a spravována soukromou organizací, která ho vlastní, uživateli třetí strany, anebo jejich kombinací. Jedná se o poměrně náročné řešení, jelikož si organizace musí spravovat celé řešení sama a jedná se o technologicky náročné řešení s velkými vstupními náklady, která jsou vhodné pro větší korporace.

**Community (komunitní) cloud**
  - Jde o cloudové řešení, které je zřízeno a poté sdíleno mezi několika subjekty, nebo několika spotřebitely z IT organizací. Zařizuje se tehdy, kdy organizace mají společné požadavky (shody, bezpečnostní požadavky). Využívá ho například vláda USA.

**Public (veřejný) cloud**
  - Jedná se o cloudové řešení, které je dostupné pro širokou veřejnost. Jako jeden z mála charakterizuje již rozšířený cloud computing od roku 1977. Vlastník nemusí mít fyzický server u sebe doma. V případě veřejného cloudu je v rukou poskytovatelů, kteří se o vše postarají. Je méně náročné na administraci. Je to jedno z řešení kdy poskytovatel musí vyhovět široké škále odběratelů. Patří sem řešení od Amazonu, Microsoftu a dalších firem.

**Hybrid (hybridní)**
  - cloud Tato infrastruktura je spojením dvou řešení, většinou na pomezí privátního a veřejného. Může jít i například o spojení soukromého i komunitního řešení. Tyto dvě infrastruktury fungují samostatně, ale jsou svázány standardizovanou technologií, která umožní přenositelnost dat. 
  - Příklad:
    1.	Vlastník má vybudované datové centrum, kde ukládá citlivá a důležitá data (privátní cloud), ale vše ostatní provozuje na veřejném cloudu.
    2.	Kombinace privátního a veřejného za pomocí tzv. cloud burstingu . Příklad: pokud privátní cloud dosáhne sto procentního využití kapacity svých prostředků, provoz se přesměruje do veřejného cloudu, tím nedochází k přerušení aplikace, popřípadě krátkému výpadku.

**Multicloud**
  - Multicloud je takový druh cloudového řešení, který využívá více cloudů (např. Microsoft Azure, Google Cloud Platform, AWS), čímž dosahuje většího zabezpečení dat. Umožňuje roprostřít zátěž, snížit latenci pro uživatele i díky globální síti datacenter cloudových služeb, kde každá platforma má centra v jiných oblastech a díky tomu se značně zvýší pokrytí.
  - Multicloud má i své nevýhody. Jednou z nich je například spravování více druhů prostředí, či složitější infrastrukturu, tuto problematiku lze řešit nástroji.

### Dělení na základě modelů služeb (Service Models)

**Software jako služba (SaaS)** 
   - Ve zkratce znamená pronájem softwaru. Využíváte službu cloudové aplikace, za kterou po určité době zaplatíte poplatek. Příkladem zde může být Microsoft Google Apps a Office 365, který na základě vaší online licence platíte a její obnova vyžaduje připojení k internetu.

**Platforma jako služba (PaaS)**
   - Tento model je využíván nejčastěji vývojáři. Podporuje vývoj webových aplikací. Vývoj, testování, nasazení, správu a aktualizace. Jedna z nejznámějších platforem je Google App Engine, AWS Elastic Beanstalk, Windows Azure, Apache Strators

**Infrastruktura jako služba (IaaS)**
   - Tento model poskytuje kompletní IT řešení firmám. Výpočetní technologie (cloud computing), úložiště, síťové a další prostředky, kde spotřebitel nasadí a zprovozní vlastní aplikaci. Příklady: Amazon EC2, Windows Azure, Google Compute Engine

**Funkce jako služba (FaaS)**
   - FaaS se často pozná a spojuje se slovem „serverless“, tedy bez serveru. To znamená, že ke spuštění služby nepotřebujeme server a běží nezávisle bez uživatelského prostředí. Umožňuje aplikace spouštět pomocí kontejnerů a vývojář se nemusí starat o další věci.
   - Jedním z příkladů může být AWS Lambda, výpočetní služba bez serveru, která slouží ke spouštění kódu dalších aplikací.
   - další výhody: platíme jen za to, co využijeme, automatické škálování atd.

Doporučoval bych zhlédnout toto video, pěkně vysvětluje, jak každý model IaaS, PaaS, SaaS a FaaS spolu souvisí (video v angličtině s titulky): https://www.youtube.com/watch?v=EOIja7yFScs

Cloud samozřejmě zahrnuje i další druhy, vyjmenoval jsem jen ty nejzákladnější.

### Výhody a nevýhody cloudových služeb

- Mezi hlavní výhody patří škálovatelnost, díky které si můžeme navyšovat či snižovat kolik RAM, jaké CPU a další parametry bude náš stroj, na kterém aplikace poběží. Toto u serveru, který bychom vlastnili fyzicky není možné. Vše bychom museli zaplatit předem a brát v potaz další kapacitní maxima, kterých provoz dosáhne. Další výhodou je, rychlost spouštění služeb. K založení virtuálního stroje potřebujeme jen pár minut. Platíme jen za to, co využíváme, takže pokud vypneme server, neplatíme nic. K datům můžeme přistupovat z libovolného místa. Ušetříme i na zařízeních, které máme, jelikož pokud se nějaké pokazí, vyměníme za druhé a opět k němu můžeme přistoupit. Co se týče serverů, ty se dají naklonovat čímž zajistíme bez výpadkový provoz služby.
- Cloud má ale i své nevýhody, a to, že nemáme přístup k fyzickému serveru a navíc nemůžeme vědět, kdo ho s námi sdílí a kde se přesně nachází. Navíc data nemáme pod kontrolou, pokud tedy nepracujeme s hybridním cloudem.

## Navigace:
  - [Cloudové služby obecně](Cloudove_sluzby_obecne.md)
  - [Amazon Web Services - Základní nastavení účtu](AWS_nastaveni.md)
  - [Virtuální stroj v AWS](AWS_navod_VM.md)
  - [Statický web v S3 Bucket](AWS_navod_static_website.md)
  - [Web postavený nad frameworkem v EC2](AWS_navod4_CI4_web.md)
  - [Návod zprovoznění CMS Wordpress](AWS_navod_wordpress.md)
  - [Dokumentace](docs/Dokumentace.doc)