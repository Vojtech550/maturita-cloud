# Google Cloud Platform

[zdroje](https://www.youtube.com/watch?v=h8fhcmLHsEI)

- poprvé založeno v roce 2008
- využívá open-source služeb, které jsou navzájem propojené
- Google je 3. největší lídrem v cloudu jako IaaS (Infrastracture as Service)
- Jako druhý nejmladší z rodiny cloudů má 29 regionů, 88 zón viz. [aktuální rozmístění služeb](https://cloud.google.com/about/locations)

[zdroj obrázku](https://kinsta.com/wp-content/uploads/2020/12/Gartner-Magic-Quadrant.png)
![magický čtverec](https://kinsta.com/wp-content/uploads/2020/12/Gartner-Magic-Quadrant.png)

- Cloudy a jejich služby mají jiné názvy, Google ale udělal přehlednou tabulku, rozdíl mezi AWS a Google Cloud.

[zdroj](https://kinsta.com/blog/google-cloud-vs-aws/)

|Feature|Amazon EC2|Compute Engine|
|:---:|:---:|:---:|
|Virtual machines| Instances| Instances
|Machine Images| Amazon Machine Image|Image
|Temporary virtual machines| Spot instances| Preemptible VMs
|Firewall| Security groups| Compute Engine| firewall rules
|Automatic instance scaling| Auto Scaling| Compute Engine autoscaler
|Local attached disk| Ephemeral disk| Local SSD
|VM import	|Supported formats: RAW, OVA, VMDK, and VHD| Supported formats: RAW, OVA,    VMDK, and VHD|
|Deployment locality| Zonal| Zonal|

- Další rozdíly, které nejsou jen v terminologii názvů, jak už je mezi AWS, GCP a Microsoft Azure je také v **modelu placení**
- **sekundový model placení (per-second billing)**, zde máme jen malý rozdíl, ale mezi hodinou a sekundou je obrovský
  - **Příklad:** Pokud chceme škálovat čili zvýšit prostředky, které využíváme, musíme za virtuální stroj zaplatit za celou hodinu, což by nás mohlo vyjít v AWS draze, hlavně pokud stroj potřebujeme jen na pár minut.

## Výhody AWS vs Microsoft Azure vs Google Cloud (Přehled)

||AWS|Microsoft Azure|Google Cloud|
|:---|:---:|:---:|:---:|
|model placení|hodinový|minutový|sekundový|
|Podle rozšíření a cen|nejstarší na trhu s nejrozšířenějšími možnostmi - nejdražší|Nejmladší, ale má relativně nízké ceny + $200 kredit|nejnižší ceny na trhu, ale méně rozšířený než AWS a Azure + $300 kredit zdarma|
|Slevy - Virtual Machine|Rezerované instance za běhu(např. na 1, nebo 3 roky)|Rezervované instance (1-3 roky až 70% sleva) [Commited use discounts)](https://cloud.google.com/compute/docs/instances/signing-up-committed-use-discounts)|Rezerované instance|

- Další slevy, které mohou tito tři lídři poskytnout u virtuálních strojů jsou i slevy, které se můžou vyšplhat až k 90%. Má to ale háček, instance můžou být smazány/jejich disky v případě, že poskytovatel potřebuje kapacitu pro prémiové služby. Více informací s kompletním přehledem na: https://www.youtube.com/watch?v=KkKcaFp0z1s
- Doporučuji zhlédnout, video obsahuje přehled hlavních bodů, včetně tzv. Responsibility modelu, co si zákazník musí hlídat sám a co za něj udělá cloud provider.

## Vytvoření Linuxové VM a statický web, web nad frameworkem CI4
- Pro vytváření virtuálních strojů nám poslouží služba Compute Engine (v AWS EC2, Azure - Virtual Machine)

- Google zde vsází na jednoduchost, lze i libovolně a intuitivně měnit počet jader CPU a další.

![Compute Engine - vytváření stroje](img_gcp/compute_engine.png)

- Výběr disku

![Compute Engine - disk](img_gcp/compute_engine_disk.png)

- připojení přes SSH za pomoci malého tlačítka:

![Compute Engine - SSH](img_gcp/compute_engine_ssh.png)

- K připojení potřebujeme Google Cloud CLI, který stáhneme zde: https://dl.google.com/dl/cloudsdk/channels/rapid/GoogleCloudSDKInstaller.exe

