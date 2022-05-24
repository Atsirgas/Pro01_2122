INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES ("10001","Informatica");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES ("10002","Administracio i finances");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES ("10003","Esports");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES ("10004","Gestio escola");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES ("10005","Educacio");
INSERT INTO tbl_dept(`codi_dept`,`nom_dept`) VALUES ("10006","Sanitari");

INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20001","ASIX1/DAW1","71");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20002","ASIX2","72");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20003","DAW2","53");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20004","AF1","54");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20005","AF2","55");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20006","AI1","56");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20007","AI2","57");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20008","EAS1","58");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20009","EAS2","59");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20010","EF1","60");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20011","EF2","61");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20012","GA1","62");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20013","GA2","63");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20014","HBD1","64");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20015","HBD2","65");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20016","SMX1","66");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20017","SMX2","67");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20018","GUIA1","68");
INSERT INTO tbl_classe(`codi_classe`,`nom_classe`,`tutor`) VALUES ("20019","GUIA2","69");



-- inserts alumnes

INSERT INTO tbl_alumne (`dni_alu`,`nom_alu`,`cognom1_alu`,`cognom2_alu`,`telf_alu`,`email_alu`,`classe`) Values 
("80883822K","Alex","Sanchez","Gonzalo","936380478","falso","20"),
("92920767P","Sergio","Garcia","Felix","741196633","segafe2@jpg.com","32"),
("00693547M","Joan","Garcia","Perez","868665308","jogape1@jpg.com","24"),
("99424656A","Pol","Martinez","Lopez","623035414","pomalo5@jpg.com","24"),
("12882927Y","Joan","Lopez","Rodriguez","988900740","joloro9@jpg.com","22"),
("35258445C","Alex","Perez","Lopez","706411939","alpelo2@jpg.com","36"),
("18028867H","Joel","Vicente","Felix","875895722","jovife1@jpg.com","27"),
("12799829F","Joel","Lopez","Garcia","615488378","jologa10@jpg.com","33"),
("41854315L","Sergio","Felix","Perez","838033778","sefepe8@jpg.com","25"),
("80612421C","Joel","Felix","Perez","919970780","jofepe7@jpg.com","25"),
("71522317E","Pol","Garcia","Sanchez","983245293","pogasa3@jpg.com","28"),
("04379667F","Pol","Gonzalo","Velasco","630933567","pogove1@jpg.com","22"),
("74251971J","Gerard","Sanchez","Martinez","783476231","gesama4@jpg.com","23"),
("62109694B","Joan","Perez","Velasco","623693405","jopeve7@jpg.com","25"),
("48501545L","Daniel","Martinez","Vicente","815056835","damavi9@jpg.com","23"),
("96178650X","Alex","Garcia","Martinez","920470558","algama5@jpg.com","36"),
("25884751E","Paco","Gonzalo","Felix","631231714","pagofe5@jpg.com","29"),
("83174988L","Joan","Felix","Lopez","638561080","jofelo7@jpg.com","32"),
("79347207J","Joel","Vicente","Vicente","836697745","jovivi1@jpg.com","23"),
("65186360J","Daniel","Martinez","Vicente","788649675","damavi8@jpg.com","34"),
("54697844A","Sergio","Vicente","Felix","602325221","sevife3@jpg.com","29"),
("41472404T","Kevin","Garcia","Garcia","987552724","kegaga9@jpg.com","36"),
("54413714S","Daniel","Garcia","Felix","878775594","dagafe8@jpg.com","38"),
("96827918B","Paco","Martinez","Perez","887906234","pamape8@jpg.com","25"),
("27248134B","Raul","Perez","Rodriguez","703243226","rapero9@jpg.com","34"),
("75424541C","Alex","Velasco","Velasco","987876156","alveve4@jpg.com","37"),
("96739231N","Daniel","Gonzalo","Gonzalo","735478122","dagogo10@jpg.com","38"),
("40206781K","Gerard","Rodriguez","Sanchez","773091721","gerosa10@jpg.com","23"),
("95423797V","Gerard","Rodriguez","Lopez","852407804","gerolo5@jpg.com","34"),
("89771236M","Alex","Sanchez","Lopez","969901068","alsalo4@jpg.com","35"),
("83803512E","Gerard","Sanchez","Garcia","745325891","gesaga3@jpg.com","21"),
("38653978V","Joel","Gonzalo","Felix","806749796","jogofe9@jpg.com","34"),
("62092861Z","Paco","Martinez","Velasco","623612216","pamave2@jpg.com","23"),
("11720583J","Sergio","Lopez","Martinez","818833264","seloma10@jpg.com","28"),
("94814696W","Daniel","Vicente","Vicente","903617350","davivi3@jpg.com","25"),
("26957959G","Joan","Sanchez","Velasco","607139030","josave5@jpg.com","37"),
("47147746T","Sergio","Velasco","Garcia","699310166","sevega4@jpg.com","27"),
("82374900D","Sergio","Vicente","Vicente","829018345","sevivi7@jpg.com","38"),
("36395594A","Daniel","Perez","Velasco","771842563","dapeve10@jpg.com","33"),
("72171603H","Daniel","Martinez","Perez","797554892","damape2@jpg.com","38"),
("16308004S","Gerard","Lopez","Martinez","985584099","geloma10@jpg.com","23"),
("80449853Q","Alex","Felix","Lopez","870375751","alfelo5@jpg.com","34"),
("33287706J","Joel","Vicente","Martinez","964133224","jovima3@jpg.com","38"),
("63666460E","Pol","Felix","Garcia","751135230","pofega2@jpg.com","22"),
("10642967Q","Gerard","Martinez","Rodriguez","832440664","gemaro7@jpg.com","26"),
("49331278G","Gerard","Perez","Martinez","653762307","gepema8@jpg.com","27"),
("25916852S","Sergio","Perez","Sanchez","967785966","sepesa1@jpg.com","23"),
("08820399Z","Alex","Martinez","Velasco","986613652","almave1@jpg.com","36");

-- consulta per fer inserts alumnes (ad)
select email_alu as Firstname, nom_alu as GivenName, cognom1_alu as SurName,  c.nom_classe as 'classe'
from tbl_alumne 
INNER JOIN tbl_classe c 
ON classe = c.id_classe

-- INSERTS PROFES

INSERT INTO tbl_professor (`nom_prof`, `cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`) VALUES  
("Paco","Gonzalo","Vicente","pagovi8@jpg.com","10010","3"),
("Sergio","Rodriguez","Rodriguez","seroro3@jpg.com","10015","2"),
("Paco","Vicente","Rodriguez","paviro3@jpg.com","10020","2"),
("Joan","Felix","Velasco","jofeve9@jpg.com","10025","1"),
("Paco","Velasco","Felix","pavefe1@jpg.com","10030","2"),
("Alex","Garcia","Lopez","algalo4@jpg.com","10035","2"),
("Joan","Velasco","Rodriguez","jovero9@jpg.com","10040","3"),
("Alex","Gonzalo","Rodriguez","algoro6@jpg.com","10045","3"),
("Joel","Felix","Garcia","jofega5@jpg.com","10050","2"),
("Daniel","Velasco","Garcia","davega9@jpg.com","10055","2"),
("Raul","Lopez","Felix","ralofe8@jpg.com","10060","3"),
("Joan","Perez","Martinez","jopema8@jpg.com","10065","2"),
("Kevin","Felix","Perez","kefepe8@jpg.com","10070","1"),
("Joan","Felix","Rodriguez","jofero4@jpg.com","10075","2"),
("Alex","Felix","Lopez","alfelo3@jpg.com","10080","2"),
("Paco","Rodriguez","Vicente","parovi5@jpg.com","10085","3"),
("Joan","Vicente","Velasco","jovive7@jpg.com","10090","2"),
("Sergio","Perez","Vicente","sepevi7@jpg.com","10095","3"),
("Sergio","Velasco","Perez","sevepe5@jpg.com","10100","2"),
("Joan","Garcia","Sanchez","jogasa6@jpg.com","10105","2"),
("Pol","Perez","Martinez","popema9@jpg.com","10110","2"),
("Gerard","Gonzalo","Lopez","gegolo8@jpg.com","10115","1"),
("Paco","Gonzalo","Lopez","pagolo9@jpg.com","10120","2"),
("Raul","Sanchez","Rodriguez","rasaro2@jpg.com","10125","2"),
("Joel","Garcia","Rodriguez","jogaro5@jpg.com","10130","1"),
("Joel","Perez","Vicente","jopevi3@jpg.com","10135","2");

-- insertem mes profesors pels departaments afegits posteriorment
INSERT INTO tbl_professor (`nom_prof`, `cognom1_prof`,`cognom2_prof`,`email_prof`,`telf`,`dept`) VALUES  
("Kevin","Garcia","Vicente","kegavi3@jpg.com","10010","5"),
("Raul","Rodriguez","Vicente","rarovi5@jpg.com","10015","6"),
("Raul","Gonzalo","Gonzalo","ragogo9@jpg.com","10020","5"),
("Kevin","Felix","Perez","kefepe5@jpg.com","10025","6"),
("Kevin","Lopez","Vicente","kelovi3@jpg.com","10030","5"),
("Joan","Martinez","Martinez","jomama7@jpg.com","10035","5"),
("Daniel","Perez","Vicente","dapevi3@jpg.com","10040","6");

-- Consulta per fer inserts professors (ad)

select email_prof as Name, nom_prof as FirstName, cognom1_prof as LastName, c.nom_dept as Grupo 
from tbl_professor 
INNER JOIN tbl_dept c  
ON dept= c.id_dept;


-- admins

INSERT INT tbl_admin (`nom_admin`,`email_admin`,`password_admin`,`telf`,`dept`) VALUES ("admin","admin@jpg.com","7110eda4d09e062aa5e4a390b0a572ac0d2c0220","55555","4");

-- aconsultar per fer insert admins (ad)

select email_admin as Name, nom_admin as FirstName, password_admin as password, c.nom_dept as 'dept'  from tbl_admin INNER JOIN tbl_dept c  ON dept= c.id_dept ;