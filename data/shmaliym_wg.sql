-- phpMyAdmin SQL Dump
-- version 3.4.10.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Лип 19 2012 р., 13:27
-- Версія сервера: 5.1.63
-- Версія PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `shmaliym_wg`
--

-- --------------------------------------------------------

--
-- Структура таблиці `cmscategories`
--

DROP TABLE IF EXISTS `cmscategories`;
CREATE TABLE IF NOT EXISTS `cmscategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `title_alias` text NOT NULL,
  `description` text NOT NULL,
  `published` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `image` text NOT NULL,
  `images` text NOT NULL,
  `param1` text NOT NULL,
  `param2` text NOT NULL,
  `param3` text CHARACTER SET utf8 NOT NULL,
  `param4` text NOT NULL,
  `param5` text NOT NULL,
  `param6` text NOT NULL,
  `param7` text NOT NULL,
  `param8` text NOT NULL,
  `param9` text NOT NULL,
  `param10` text NOT NULL,
  `param11` text NOT NULL,
  `param12` text NOT NULL,
  `param13` text NOT NULL,
  `param14` text NOT NULL,
  `param15` text NOT NULL,
  `param16` text NOT NULL,
  `param17` text NOT NULL,
  `param18` text NOT NULL,
  `param19` text NOT NULL,
  `param20` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=147 ;

--
-- Дамп даних таблиці `cmscategories`
--

INSERT INTO `cmscategories` (`id`, `parent_id`, `title`, `title_alias`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `image`, `images`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `param9`, `param10`, `param11`, `param12`, `param13`, `param14`, `param15`, `param16`, `param17`, `param18`, `param19`, `param20`) VALUES
(24, 0, 'Новости', 'news', '', 1, 0, '0000-00-00 00:00:00', 2, '', '', 'News', '15', 'Nachrichten', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, 0, 'Направления деятельности', 'areas_of_activity', '<h2>Года четыре назад был у меня КПК HP iPAQ 214.</h2>\n&nbsp;&laquo;Последний из Могикан&raquo; &mdash; без  телефонного модуля. Радовал крупным и чётким по тем временам экраном. И вот  однажды захотелось мне на этом самом экране, на рабочем столе, который в стоящей  там Винмобайл именовался &laquo;тудеем&raquo;, видеть красивые картинки. Разумеется, на  просторах интернета нашёлся пак с коллекцией разных обоев подходящего разрешения  в формате PNG.', 1, 0, '0000-00-00 00:00:00', 1, '/contents/areas_of_activity/global.jpg', '/contents/areas_of_activity/global_ru.png|/contents/areas_of_activity/global_en.png|/contents/areas_of_activity/global_de.png', 'Areas of activity', '<h2><span id="result_box" lang="en"><span>Four years ago</span> <span>I had a</span> <span>HP iPAQ 214</span><span>.</span></span></h2>\n<span id="result_box" lang="en"><span>"The Last</span> <span>of the Mohicans</span><span>" - without</span> <span>phone module.</span> <span>Large and</span> <span>clearly</span> <span>pleased</span> <span>at the time</span> <span>the screen.</span> <span>And then one day</span> <span>I wanted to</span> <span>on this very</span> <span>screen</span> <span>on the desktop</span><span>, which</span> <span>stands</span> <span>there</span> <span>Vinmobayl</span> <span>was called "</span><span>Tudeh</span><span>",</span> <span>see the</span> <span>beautiful pictures</span><span>.</span> <span>Of course,</span> <span>on the Internet</span> <span>found a</span> <span>pack</span> <span>with a collection of</span> <span>different wallpapers</span> <span>proper</span> <span>authorization</span> <span>in the format of</span> <span>PNG.</span></span>', 'Tätigkeitsbereiche', '<h2><span id="result_box" lang="de"><span>Vor vier Jahren</span> <span>hatte ich einen</span> <span>HP iPAQ 214</span><span>.</span></span></h2>\n<span id="result_box" lang="de"><span>"Der</span> <span>letzte Mohikaner</span><span>" - ohne</span> <span>Telefon</span><span>-Modul.</span> <span>Gro&szlig;e und klar</span> <span>zum Zeitpunkt</span> <span>der Bildschirm</span> <span>sehr zufrieden.</span> <span>Und dann eines Tages</span> <span>wollte ich</span> <span>auf diesem</span> <span>Bildschirm</span> <span>sehr</span> <span>auf dem Desktop</span><span>, was</span> <span>da steht</span> <span>Vinmobayl</span> <span>hie&szlig; "</span><span>Tudeh</span><span>"</span> <span>finden Sie in den</span> <span>sch&ouml;nen Bildern</span><span>.</span> <span>Nat&uuml;rlich</span> <span>finden Sie im Internet</span> <span>eine Packung</span> <span>mit einer Sammlung von</span> <span>verschiedenen</span> <span>Tapeten</span> <span>entsprechende Genehmigung</span> <span>im Format</span> <span>PNG.</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `cmscontent`
--

DROP TABLE IF EXISTS `cmscontent`;
CREATE TABLE IF NOT EXISTS `cmscontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` text CHARACTER SET cp1251 NOT NULL,
  `title` text CHARACTER SET cp1251 NOT NULL,
  `title_alias` text CHARACTER SET cp1251 NOT NULL,
  `introtext` text CHARACTER SET cp1251 NOT NULL,
  `fulltext` text CHARACTER SET cp1251 NOT NULL,
  `created` bigint(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `publish_up` bigint(20) NOT NULL,
  `publish_down` bigint(20) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `image` text CHARACTER SET cp1251 NOT NULL,
  `images` text CHARACTER SET cp1251 NOT NULL,
  `hits` int(11) NOT NULL,
  `param1` text CHARACTER SET cp1251 NOT NULL,
  `param2` text CHARACTER SET cp1251 NOT NULL,
  `param3` text CHARACTER SET cp1251 NOT NULL,
  `param4` text NOT NULL,
  `param5` text NOT NULL,
  `param6` text NOT NULL,
  `param7` text CHARACTER SET cp1251 NOT NULL,
  `param8` text CHARACTER SET cp1251 NOT NULL,
  `param9` text CHARACTER SET cp1251 NOT NULL,
  `param10` text CHARACTER SET cp1251 NOT NULL,
  `param11` text CHARACTER SET cp1251 NOT NULL,
  `param12` text CHARACTER SET cp1251 NOT NULL,
  `param13` text CHARACTER SET cp1251 NOT NULL,
  `param14` text CHARACTER SET cp1251 NOT NULL,
  `param15` text CHARACTER SET cp1251 NOT NULL,
  `param16` text CHARACTER SET cp1251 NOT NULL,
  `param17` text CHARACTER SET cp1251 NOT NULL,
  `param18` text CHARACTER SET cp1251 NOT NULL,
  `param19` text CHARACTER SET cp1251 NOT NULL,
  `param20` text CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5710 ;

--
-- Дамп даних таблиці `cmscontent`
--

INSERT INTO `cmscontent` (`id`, `parent_id`, `title`, `title_alias`, `introtext`, `fulltext`, `created`, `created_by`, `published`, `publish_up`, `publish_down`, `checked_out`, `checked_out_time`, `ordering`, `image`, `images`, `hits`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `param9`, `param10`, `param11`, `param12`, `param13`, `param14`, `param15`, `param16`, `param17`, `param18`, `param19`, `param20`) VALUES
(5560, '0', 'О компании', 'about', '<p>Компания Wutmarc на протяжении многих лет ведет свою деятельность в четырех основных направлениях: WUTMARC WELDING TECHNOLOGY, WUTMARC SPECIAL ALLOYS, WUTMARC STAINLESS STEEL и WUTMARC NONFERROUS METALS. На протяжении всего периода существования компании велись работы по разработке высокотехнологичных сплавов для специального применения и точных процессов. Сегодня компания Wutmarc - один из мировых лидеров по производству сварочных материалов, специальных и нержавеющих сталей и сплавов, а также продукции из цветных металлов и сплавов.</p>\n<p>Программа поставок включает следующую продукцию:</p>\n<ol>\n<li>Проволоку</li>\n<li>Ленту</li>\n<li>Лист, плиту</li>\n<li>Круг, бруски и прутки</li>\n<li>Трубы и тpyбную заготовку</li>\n<li>Продукцию с магнитными свойствами</li>\n<li>Металлические фильтры.</li>\n<li>Термобиметаллы.</li>\n<li>Кольца раскатные.</li>\n</ol>\n<p>Главный офис компании находится в городе Дюссельдорфе (Германия) и имеет сеть консультационных центров, офисов по продажам и представительств во многих странах Европы. В настоящий момент компания Wutmarc обладает широкой сетью складов и значительными товарными запасами различных форм продуктов. Более 2000 человек работает в отделах продаж компании Wutmarc. Создан информационный сервисный центр, который позволяет оперативно ответить на любой запрос клиента.</p>\n<p>В связи с тем, что качество нашей продукции имеет для нас первостепенное значение, в 1994  г. мы провели процедуру сертификации компании в соответствии с нормами ISO 9001. В 2003 году наша продукция сертифицирована согласно согласно нормам ISO 9001:2000.</p>\n<p>В производственной программе Концерна Wutmarc насчитывается более 100 сплавов. Компания особое внимание уделяет поставкам своей продукции в страны СНГ, как наиболее перспективным рынкам Европы. В связи с этим специально для стран СНГ выпускается целый ряд продукции, изготовленной по стандарту ГОСТ.</p>\n<p>В настоящем каталоге приведен не полный перечень продукции. По поводу приобретения материалов со специальными заданными свойствами и других, не указанных в каталоге, обращайтесь непосредственно в представительства компании.</p>', '', 1331395399, 0, 1, 1331395399, 943912800, 1, '2012-03-30 14:48:00', 2, '', '', 0, 'About the company', 'Wutmarc company for many years and operates in four main areas: WUTMARC WELDING TECHNOLOGY, WUTMARC SPECIAL ALLOYS, WUTMARC STAINLESS STEEL and WUTMARC NONFERROUS METALS. Throughout the period of the company were working on the development of high-tech alloys for special applications and accurate processes. Today, the company Wutmarc - one of the world''s leading manufacturers of welding consumables, special and stainless steels and alloys, as well as the production of nonferrous metals and alloys.<br /><br />Delivery program includes the following products:<br /><ol>\n<li>Wire</li>\n<li>Tape</li>\n<li>Sheet, plate</li>\n<li>Krug, bars and rods</li>\n<li>Pipes and tpybnuyu workpiece</li>\n<li>Products with magnetic properties</li>\n<li>Metal filters.</li>\n<li>Thermostatic bimetal.</li>\n<li>Inker rings.</li>\n</ol> <br />The company is headquartered in Dusseldorf (Germany) and has a network of advice centers, sales offices and representatives in many European countries. The company currently has an extensive network Wutmarc warehouses and significant inventory of different forms of products. More than 2,000 people working in sales of the company Wutmarc. An information service center, which allows you to respond promptly to any request by the client.<br /><br />Due to the fact that the quality of our product has a paramount importance to us, in 1994 we had a procedure for certification of the company in accordance with ISO 9001. In 2003, our products are certified according to standards in accordance with ISO 9001:2000.<br /><br />In the production program of Concern Wutmarc more than 100 alloys. The company pays special attention to supply its products to the CIS countries, as the most promising markets in Europe. In this regard, especially for the CIS countries produced a number of products manufactured in compliance with GOST.<br /><br />This directory provides a complete list of products. With regard to the purchase of materials with specific desired properties, and others not listed in the catalog, please contact the offices of the company.', '0', 'Über das Unternehmen', 'Wutmarc Unternehmen seit vielen Jahren und ist in vier Hauptbereiche: WUTMARC Schwei&szlig;technik, WUTMARC SPEZIALLEGIERUNGEN, WUTMARC EDELSTAHL WUTMARC und NE-Metalle. W&auml;hrend des gesamten Zeitraums des Unternehmens wurden auf die Entwicklung von High-Tech-Legierungen f&uuml;r spezielle Anwendungen und Prozesse pr&auml;zise arbeiten. Heute ist das Unternehmen Wutmarc - einer der weltweit f&uuml;hrenden Hersteller von Schwei&szlig;zus&auml;tzen, Spezial-und Edelst&auml;hle und Legierungen, sowie die Produktion von NE-Metallen und Legierungen.<br /><br />\n<p>Lieferprogramm beinhaltet folgende Produkte:</p>\n<ol>\n<li>Draht</li>\n<li>Band</li>\n<li>Bleche, Platten</li>\n<li>Krug, Stabstahl und Walzdraht</li>\n<li>Rohre und tpybnuyu Werkst&uuml;ck</li>\n<li>Produkte mit magnetischen Eigenschaften</li>\n<li>Metallfilter.</li>\n<li>Thermische Bi.</li>\n<li>Waelzringe.</li>\n</ol><br />Das Unternehmen ist in D&uuml;sseldorf (Deutschland) ans&auml;ssig und verf&uuml;gt &uuml;ber ein Netz von Beratungsstellen, Vertriebsniederlassungen und Vertretungen in vielen L&auml;ndern Europas. Derzeit besch&auml;ftigt das Unternehmen &uuml;ber ein umfangreiches Netzwerk Wutmarc Lagerhallen und bedeutende Inventar der verschiedenen Arten von Produkten. Mehr als 2.000 Menschen arbeiten im Vertrieb der Firma Wutmarc. Eine Information Service Center, das Ihnen umgehend antworten auf jede Anfrage von dem Client erm&ouml;glicht.<br /><br />Aufgrund der Tatsache, dass die Qualit&auml;t unseres Produktes eine &uuml;berragende Bedeutung f&uuml;r uns hat, im Jahr 1994 hatten wir ein Verfahren f&uuml;r die Zertifizierung des Unternehmens nach ISO 9001. Im Jahr 2003 werden unsere Produkte nach den Normen gem&auml;&szlig; ISO 9001:2000 zertifiziert.<br /><br />Im Produktionsprogramm von Concern Wutmarc mehr als 100 Legierungen. Das Unternehmen legt besonderen Wert auf seine Produkte in den GUS-Staaten zu liefern, als die aussichtsreichsten M&auml;rkte in Europa. In dieser Hinsicht, vor allem f&uuml;r die GUS-Staaten produziert eine Reihe von Produkten in &Uuml;bereinstimmung mit GOST hergestellt.<br /><br />Dieses Verzeichnis enth&auml;lt eine vollst&auml;ndige Liste der Produkte. Im Hinblick auf den Kauf von Materialien mit spezifischen gew&uuml;nschten Eigenschaften, und andere, die nicht im Katalog aufgef&uuml;hrt sind, kontaktieren Sie bitte die B&uuml;ros des Unternehmens.<br />', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5534, '0', 'Многопрофильная корпорация Wutmark', 'seo', '<div>\n<p>Корпорация &laquo;Демис Груп&raquo; - это холдинговая компания, действующая по принципам фонда прямых инвестиций.  		Наша инвестиционная стратегия - вкладывать в Бизнесы, которые занимают лидирующие позиции в растущих сегментах рынка.</p>\n<p>Наш инвестиционный портфель:</p>\n<p>Торгово-промышленный холдинг &laquo;Демис Канц&raquo;<br /> &laquo;Демис Канц&raquo; - является единственной компанией на рынке, которая занимается одновременно производством,  		импортом и продажей канцелярских товаров, бумаги и упаковочных материалов.  		Не имея аналогичных конкурентов и конкурируя с узкопрофильными компаниями,  		&laquo;Демис Канц&raquo; входит в тройку лидеров канцелярского рынка, занимает второе место по объемам импорта  и является единственным  		в Украине производителем высококачественной бумаги А4, находится на втором месте по продажам скотча и упаковочных материалов,  		что в совокупности делает его компанией №1 на канцелярско-бумажном рынке Украины.</p>\n<p>Агрохолдинг &laquo;Демис Агро&raquo;<br /> Относится к 15 крупнейшим  свиноводческим предприятиям Украины и входит в ТОП-4 компаний Днепропетровской области  		(в Днепропетровской обл. более 200 свиноводческих хозяйств). Сегодня Агрохолдинг &laquo;Демис Агро&raquo; - это интегрированный  		производитель с замкнутым циклом (репродукция, доращивание, кормовая база). Мощность 1800 свиноматок,  		производительность до 36 000 товарных свиней в год. Приобретена производственная площадка в с. Чапли,  		где  планируется реализация уникального инвестиционного проекта по созданию племенного репродуктора.</p>\n<p>Торговая группа &laquo;Демикс&raquo;<br /> Входит в 10-ку крупнейших компаний Украины в своем сегменте и занимает лидирующие позиции в следующих  		направлениях деятельности: продажа электроинструментов ТМ Powertec и ТМ Зенит, погрузочной техники Nissan,  		Manitou, OMG, EP, Takado; дерево- и металлообрабатывающих станков ТМ Optimum и ТМ FDВ,  		а также имеет сервисные центры по всей Украине).</p>\n<p>Другие инвестиционные проекты</p>\n<ul>\n<li>логистический комплекс и т.д. (площадь складских помещений порядка 80 000 м2,автомобильный парк 38  		грузовых машин различного тоннажа).</li>\n<li>типография &laquo;Спринт&raquo;</li>\n<li>девелопмент</li>\n</ul>\n<p>Сегодня Корпорация &laquo;Демис Груп&raquo; активно инвестирует в развитие прибыльных продуктов, инновации, оборудование,  		технологии и обучение сотрудников, общая численность которых достигла 1500 человек.</p>\n<p>Эти инвестиции позволяют каждому из бизнесов Корпорации успешно развиваться и удерживать лидирующие позиции на рынке  		в своих сегментах.</p>\n</div>', '', 1330474341, 0, 1, 1330474341, 943912800, 0, '0000-00-00 00:00:00', 4, '', '', 0, 'Conglomerate Wutmark', '<span id="result_box" lang="en"><span title="Корпорация &laquo;Демис Груп&raquo; - это холдинговая компания, действующая по принципам фонда прямых инвестиций.">Corporation "Demis Group" - is a holding company operating on the principles of equity fund. </span><span title="Наша инвестиционная стратегия - вкладывать в Бизнесы, которые занимают лидирующие позиции в растущих сегментах рынка.">Our investment strategy - to invest in businesses that are leaders in growing market segments.<br /><br /></span><span title="Наш инвестиционный портфель:">Our investment portfolio:<br /><br /></span><span title="Торгово-промышленный холдинг &laquo;Демис Канц&raquo;">Commercial and Industrial Holding "Demis Kanz"<br /></span><span title="&laquo;Демис Канц&raquo; - является единственной компанией на рынке, которая занимается одновременно производством, импортом и продажей канцелярских товаров, бумаги и упаковочных материалов.">"Demis  Stationery" - is the only company in the market, which deals with both  the production, import and sale of office supplies, paper and packaging  materials. </span><span title="Не имея аналогичных конкурентов и конкурируя с узкопрофильными компаниями, &laquo;Демис Канц&raquo; входит в тройку лидеров канцелярского рынка, занимает второе место по объемам импорта и является единственным в Украине производителем высококачественной бумаги А4, находится на втором месте по продажам скотча и упаковочных материалов, что в">With  no similar competitors and competing with the narrow-profile companies,  "Kanz Demis'' is one of three leaders of the clerical market, ranked  second in terms of imports and is the only Ukrainian producer of  high-quality A4 paper, is in second place on sales of adhesive tape and  packaging materials that </span><span title="совокупности делает его компанией №1 на канцелярско-бумажном рынке Украины.">combined to make his company number one in the red-paper market of Ukraine.<br /><br /></span><span title="Агрохолдинг &laquo;Демис Агро&raquo;">Agroholding "Demis Agro"<br /></span><span title="Относится к 15 крупнейшим свиноводческим предприятиям Украины и входит в ТОП-4 компаний Днепропетровской области (в Днепропетровской обл. более 200 свиноводческих хозяйств).">Refers  to the 15 largest enterprises of Ukraine and the pig is in the top four  companies Dnipropetrovsk region (in the Dnipropetrovsk region. More  than 200 pig farms). </span><span title="Сегодня Агрохолдинг &laquo;Демис Агро&raquo; - это интегрированный производитель с замкнутым циклом (репродукция, доращивание, кормовая база).">Today Agroholding "Demis Agro" - is an integrated manufacturer of closed-cycle (reproduction, rearing, food supply). </span><span title="Мощность 1800 свиноматок, производительность до 36 000 товарных свиней в год.">Power 1800 sows, capacity up to 36,000 commercial pigs a year. </span><span title="Приобретена производственная площадка в с.">Purchased at a production site. </span><span title="Чапли, где планируется реализация уникального инвестиционного проекта по созданию племенного репродуктора.">Chapla, where the investment is planned to implement a unique project to create a tribal loudspeaker.<br /><br /></span><span title="Торговая группа &laquo;Демикс&raquo;">Trade group "Demiks"<br /></span><span title="Входит в 10-ку крупнейших компаний Украины в своем сегменте и занимает лидирующие позиции в следующих направлениях деятельности: продажа электроинструментов ТМ Powertec и ТМ Зенит, погрузочной техники Nissan, Manitou, OMG, EP, Takado; дерево- и металлообрабатывающих станков ТМ Optimum и ТМ FDВ">Included  in the 10 largest companies in Ukraine in its segment, and occupies  leading positions in the following areas: sales of power tools Powertec  TM and TM Zenith, forklifts Nissan, Manitou, OMG, EP, Takado; wood and  metal working machines Optimum TM and TM FDV </span><span title=", а также имеет сервисные центры по всей Украине).">and also has service centers all over Ukraine).<br /><br /></span><span title="Другие инвестиционные проекты">Other investment projects<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="логистический комплекс и т.д.">logistics center, etc. </span><span title="(площадь складских помещений порядка 80 000 м2,автомобильный парк 38 грузовых машин различного тоннажа).">(Warehouse area of</span></span>', '0', 'Conglomerate Wutmarc', '<span id="result_box" lang="de"><span title="Корпорация &laquo;Демис Груп&raquo; - это холдинговая компания, действующая по принципам фонда прямых инвестиций.">Corporation "Demis Group" - ist eine Holdinggesellschaft, die auf den Grunds&auml;tzen der Equity-Fonds. </span><span title="Наша инвестиционная стратегия - вкладывать в Бизнесы, которые занимают лидирующие позиции в растущих сегментах рынка.">Unsere Anlagestrategie - in Unternehmen, die f&uuml;hrend in wachsenden Marktsegmente sind zu investieren.<br /><br /></span><span title="Наш инвестиционный портфель:">Unser Investment-Portfolio:<br /><br /></span><span title="Торгово-промышленный холдинг &laquo;Демис Канц&raquo;">Gewerbe und Industrie Holding "Demis Kanz"<br /></span><span title="&laquo;Демис Канц&raquo; - является единственной компанией на рынке, которая занимается одновременно производством, импортом и продажей канцелярских товаров, бумаги и упаковочных материалов.">"Demis  Stationery" - ist das einzige Unternehmen auf dem Markt, die sowohl mit  der Produktion, Import und Verkauf von B&uuml;romaterial, Papier und  Verpackungsmaterial besch&auml;ftigt. </span><span title="Не имея аналогичных конкурентов и конкурируя с узкопрофильными компаниями, &laquo;Демис Канц&raquo; входит в тройку лидеров канцелярского рынка, занимает второе место по объемам импорта и является единственным в Украине производителем высококачественной бумаги А4, находится на втором месте по продажам скотча и упаковочных материалов, что в">Da  es keine vergleichbare Konkurrenz und Wettbewerb mit den  schmal-Profil-Unternehmen ", Kanz Demis ''ist einer der drei F&uuml;hrer des  klerikalen Markt, rangiert in Bezug auf die Einfuhr Sekunden und ist die  einzige ukrainische Hersteller von hochwertigen A4-Papier, ist auf dem  zweiten Platz bei einem Umsatz von Klebeband und Verpackungsmaterial,  dass </span><span title="совокупности делает его компанией №1 на канцелярско-бумажном рынке Украины.">kombiniert, um sein Unternehmen die Nummer eins in der rot-Paper-Markt der Ukraine zu machen.<br /><br /></span><span title="Агрохолдинг &laquo;Демис Агро&raquo;">Agroholding "Demis Agro"<br /></span><span title="Относится к 15 крупнейшим свиноводческим предприятиям Украины и входит в ТОП-4 компаний Днепропетровской области (в Днепропетровской обл. более 200 свиноводческих хозяйств).">Bezieht  sich auf den 15 gr&ouml;&szlig;ten Unternehmen der Ukraine und das Schwein ist in  den Top vier Unternehmen Dnipropetrovsk Region (in der Region  Dnipropetrovsk. Mehr als 200 Schweinefarmen). </span><span title="Сегодня Агрохолдинг &laquo;Демис Агро&raquo; - это интегрированный производитель с замкнутым циклом (репродукция, доращивание, кормовая база).">Heute  Agroholding "Demis Agro" - ist ein integrierter Hersteller von  Closed-Cycle-(Fortpflanzungs-, Aufzucht-, Lebensmittel-Versorgung). </span><span title="Мощность 1800 свиноматок, производительность до 36 000 товарных свиней в год.">Leistung 1800 Sauen, Kapazit&auml;t bis zu 36.000 kommerzielle Schweine pro Jahr. </span><span title="Приобретена производственная площадка в с.">Gekauft bei einem Produktionsstandort. </span><span title="Чапли, где планируется реализация уникального инвестиционного проекта по созданию племенного репродуктора.">Chapla,  in dem die Investition geplant, um ein einzigartiges Projekt, um einen  Stammes-Lautsprecher erzeugen implementieren wird.<br /><br /></span><span title="Торговая группа &laquo;Демикс&raquo;">Handel-Gruppe "Demiks"<br /></span><span title="Входит в 10-ку крупнейших компаний Украины в своем сегменте и занимает лидирующие позиции в следующих направлениях деятельности: продажа электроинструментов ТМ Powertec и ТМ Зенит, погрузочной техники Nissan, Manitou, OMG, EP, Takado; дерево- и металлообрабатывающих станков ТМ Optimum и ТМ FDВ">Inbegriffen  in den 10 gr&ouml;&szlig;ten Unternehmen in der Ukraine in seinem Segment und  nimmt f&uuml;hrende Positionen in den folgenden Bereichen: Verkauf von  Elektrowerkzeugen Powertec TM-und TM-Zenith, Gabelstapler Nissan,  Manitou, OMG, EP, Takado, Holz und Metall verarbeitende Maschinen  Optimum TM-und TM-FDV </span><span title=", а также имеет сервисные центры по всей Украине).">und hat auch Service-Zentren &uuml;berall in der Ukraine).<br /><br /></span><span title="Другие инвестиционные проекты">Andere Investitionsprojekte<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="логистический комплекс и т.д.">Logistik-Zentrum, etc. </span><span title="(площадь складских помещений порядка 80 000 м2,автомобильный парк 38 грузовых машин различного тоннажа).">(Lagerfl&auml;che von 80 000 m2, Parkplatz 38 Lastwagen verschiedener Tonnage).<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="типография &laquo;Спринт&raquo;">Drucken "Sprint"<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="девелопмент">Entwicklung<br /><br /></span><span title="Сегодня Корпорация &laquo;Демис Груп&raquo; активно инвестирует в развитие прибыльных продуктов, инновации, оборудование, технологии и обучение сотрудников, общая численность которых достигла 1500 человек.">Heute  ist das Unternehmen "Demis Group" investiert aktiv in der Entwicklung  von profitablen Produkte, Innovationen, Ausr&uuml;stung, Technologie und  Ausbildung, erreichte die Gesamtzahl von denen 1.500.<br /><br /></span><span title="Эти инвестиции позволяют каждому из бизнесов Корпорации успешно развиваться и удерживать лидирующие позиции на рынке в своих сегментах.">Diese  Investitionen werden damit jedes der Gesch&auml;fte des Unternehmens  erfolgreich zu entwickeln und zu halten die Marktf&uuml;hrerschaft in ihren  jeweiligen Segmenten.</span></span>', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5550, '0', 'Текст внизу', 'footer_text', 'Copyright &nbsp;2012 &copy; Для друзей. Все права на предоставленную информацию принадлежат владельцу.', '', 1331337049, 0, 1, 1331337049, 943912800, 0, '0000-00-00 00:00:00', 3, '', '', 0, '0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5704, '0', 'Контактная информация', 'contacts', '<p id="story_8833">Трясутся руки, покрывается потом лоб, я медленно  сползаю со стула.<br /><br />Полчаса набивал программу в nano, сохранил. Двойной  щелчок &mdash; и появляется окошко с надписью &laquo;Visual Studio&raquo;. В линухе? За что? Как  оно здесь оказалось?..<br /><br />Только потом разгрёб. Оказалось, Wine вместе с  DirectX скачал из инета и поставил пару программ, чтоб работал. И, зараза такая,  связал с ними все типы файлов!</p>', '', 1332784557, 0, 1, 1332784557, 943912800, 0, '0000-00-00 00:00:00', 1, '', '', 0, 'Contact Information', '<span id="result_box" lang="en"><span>Shaking</span> <span>hands,</span> <span>then</span> <span>covered</span> <span>his forehead</span><span>, I slowly</span> <span>crawl down</span> <span>from the chair.</span><br /><br /> <span>Half an hour</span> <span>stuffing</span> <span>program in</span> <span>nano,</span> <span>retained</span><span>.</span> <span>Double-click</span> <span>-</span> <span>and there is</span> <span>a window</span> <span>with the inscription</span> <span>&laquo;Visual Studio&raquo;.</span> <span>In</span> <span>linuh</span><span>?</span> <span>For what?</span> <span>As it</span> <span>turned out</span> <span>here</span><span>? ..</span><br /><br /> <span>Only then</span> <span>scraped away</span><span>.</span> <span>It turned out</span><span>, Wine</span><span>, along</span> <span>with DirectX</span> <span>downloaded</span> <span>from internet</span> <span>and put</span> <span>a couple of programs</span> <span>to work.</span> <span>And</span> <span>such</span> <span>an infection</span><span>, and bound</span> <span>them</span> <span>all file types</span><span>!</span></span>', '', 'Kontakt Information', '<span id="result_box" lang="de"><span>H&auml;nde sch&uuml;tteln,</span> <span>dann</span> <span>bedeckte seine Stirn</span><span>,</span> <span>ich langsam</span> <span>kriechen</span> <span>vom Stuhl</span><span>.</span><br /><br /> <span>Eine halbe Stunde</span> <span>Programm</span> <span>F&uuml;llung</span> <span>in</span> <span>nano,</span> <span>beibehalten.</span> <span>Doppelklicken Sie auf</span> <span>-</span> <span>und</span> <span>gibt es ein Fenster</span> <span>mit der Aufschrift</span> <span>&laquo;</span><span>Visual Studio</span><span>&raquo;</span><span>.</span> <span>In</span> <span>linuh</span><span>?</span> <span>F&uuml;r was?</span> <span>Wie sich herausstellte</span> <span>hier</span><span>? ..</span><br /><br /> <span>Erst dann</span> <span>schabte</span><span>.</span> <span>Es stellte sich heraus</span><span>, Wein</span><span>, zusammen mit</span> <span>DirectX</span> <span>aus dem Internet</span> <span>heruntergeladen und</span> <span>tat ein paar</span> <span>Programmen</span> <span>zu arbeiten.</span> <span>Und</span> <span>eine solche Infektion</span><span>,</span> <span>und</span> <span>band sie</span> <span>alle Dateitypen</span><span>!</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5705, '146', 'WUTMARC WELDING TECHNOLOGY', '', 'Впрочем, может, так оно и есть: ситхи из &laquo;Звёздных войн&raquo; тоже получали конечный  результат проще и быстрее, чем джедаи, но, конечно, без романтического ореола и  преодоления препятствий. Поэтому мне кажется, что целью 95% айтишников и  околоайтишников является именно сам факт преодоления, а не выполнение  поставленной задачи.', '', 1332846050, 0, 1, 1332846050, 943912800, 0, '0000-00-00 00:00:00', 1, '/contents/areas_of_activity/welding_technology.jpg', '/contents/areas_of_activity/welding_technology_ru.png', 0, 'WUTMARC WELDING TECHNOLOGY', '<span id="result_box" lang="en"><span>However</span><span>, maybe</span> <span>the way it is</span><span>:</span> <span>Sith</span> <span>from "Star</span> <span>Wars</span><span>" also</span> <span>received</span> <span>the final result</span> <span>is simpler and</span> <span>faster than the</span> <span>Jedi</span><span>, but</span><span>, of course,</span> <span>without the</span> <span>romantic aura</span> <span>and overcome obstacles.</span> <span>Therefore,</span> <span>it seems to me</span> <span>that the purpose of</span> <span>95% of</span> <span>IT pros</span> <span>and</span> <span>okoloaytishnikov</span> <span>is precisely</span> <span>the fact of</span> <span>overcoming</span><span>, and</span> <span>not the fulfillment of</span> <span>the task.</span></span>', '', 'WUTMARC SCHWEISSTECHNIK', '<span id="result_box" lang="de"><span>Aber vielleicht</span><span>, wie es ist</span><span>:</span> <span>Sith</span> <span>aus</span> <span>"Star Wars"</span> <span>erhielt auch</span> <span>das Endergebnis ist</span> <span>einfacher und schneller als</span> <span>der Jedi-Ritter</span><span>, aber</span> <span>nat&uuml;rlich</span> <span>ohne die</span> <span>romantische Aura</span> <span>und Hindernisse zu &uuml;berwinden</span><span>.</span> <span>Daher</span> <span>scheint es mir</span><span>, dass das Ziel</span> <span>von 95% der</span> <span>IT-Experten und</span> <span>okoloaytishnikov</span> <span>genau</span> <span>ist die Tatsache</span> <span>zu &uuml;berwinden</span><span>,</span> <span>und nicht die Erf&uuml;llung</span> <span>der Aufgabe.</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5706, '146', 'WUTMARC SPECIAL ALLOYS', '', 'Впрочем, может, так оно и есть: ситхи из &laquo;Звёздных войн&raquo; тоже получали конечный результат проще и быстрее, чем джедаи, но, конечно, без романтического ореола и преодоления препятствий. Поэтому мне кажется, что целью 95% айтишников и околоайтишников является именно сам факт преодоления, а не выполнение поставленной задачи.', '', 1332846106, 0, 1, 1332846106, 943912800, 0, '0000-00-00 00:00:00', 2, '/contents/areas_of_activity/special_alloys.jpg', '/contents/areas_of_activity/special_alloys_ru.png', 0, 'WUTMARC SPECIAL ALLOYS', '<span id="result_box" lang="en"><span>However</span><span>, maybe</span> <span>the way it is</span><span>:</span> <span>Sith</span> <span>from "Star</span> <span>Wars</span><span>" also</span> <span>received</span> <span>the final result</span> <span>is simpler and</span> <span>faster than the</span> <span>Jedi</span><span>, but</span><span>, of course,</span> <span>without the</span> <span>romantic aura</span> <span>and overcome obstacles.</span> <span>Therefore,</span> <span>it seems to me</span> <span>that the purpose of</span> <span>95% of</span> <span>IT pros</span> <span>and</span> <span>okoloaytishnikov</span> <span>is precisely</span> <span>the fact of</span> <span>overcoming</span><span>, and</span> <span>not the fulfillment of</span> <span>the task.</span></span>', '', 'WUTMARC SPEZIALLEGIERUNGEN', '<span id="result_box" lang="de"><span>Aber vielleicht</span><span>, wie es ist</span><span>:</span> <span>Sith</span> <span>aus</span> <span>"Star Wars"</span> <span>erhielt auch</span> <span>das Endergebnis ist</span> <span>einfacher und schneller als</span> <span>der Jedi-Ritter</span><span>, aber</span> <span>nat&uuml;rlich</span> <span>ohne die</span> <span>romantische Aura</span> <span>und Hindernisse zu &uuml;berwinden</span><span>.</span> <span>Daher</span> <span>scheint es mir</span><span>, dass das Ziel</span> <span>von 95% der</span> <span>IT-Experten und</span> <span>okoloaytishnikov</span> <span>genau</span> <span>ist die Tatsache</span> <span>zu &uuml;berwinden</span><span>,</span> <span>und nicht die Erf&uuml;llung</span> <span>der Aufgabe.</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5707, '146', 'WUTMARC STAINLESS STEEL', '', 'Впрочем, может, так оно и есть: ситхи из &laquo;Звёздных войн&raquo; тоже получали конечный результат проще и быстрее, чем джедаи, но, конечно, без романтического ореола и преодоления препятствий. Поэтому мне кажется, что целью 95% айтишников и околоайтишников является именно сам факт преодоления, а не выполнение поставленной задачи.', '', 1332846128, 0, 1, 1332846128, 943912800, 0, '0000-00-00 00:00:00', 3, '/contents/areas_of_activity/stainless_steel.jpg', '/contents/areas_of_activity/stainless_steel_ru.png', 0, 'WUTMARC STAINLESS STEEL', '<span id="result_box" lang="en"><span>However</span><span>, maybe</span> <span>the way it is</span><span>:</span> <span>Sith</span> <span>from "Star</span> <span>Wars</span><span>" also</span> <span>received</span> <span>the final result</span> <span>is simpler and</span> <span>faster than the</span> <span>Jedi</span><span>, but</span><span>, of course,</span> <span>without the</span> <span>romantic aura</span> <span>and overcome obstacles.</span> <span>Therefore,</span> <span>it seems to me</span> <span>that the purpose of</span> <span>95% of</span> <span>IT pros</span> <span>and</span> <span>okoloaytishnikov</span> <span>is precisely</span> <span>the fact of</span> <span>overcoming</span><span>, and</span> <span>not the fulfillment of</span> <span>the task.</span></span>', '', 'WUTMARC EDELSTAHL', '<span id="result_box" lang="de"><span>Aber vielleicht</span><span>, wie es ist</span><span>:</span> <span>Sith</span> <span>aus</span> <span>"Star Wars"</span> <span>erhielt auch</span> <span>das Endergebnis ist</span> <span>einfacher und schneller als</span> <span>der Jedi-Ritter</span><span>, aber</span> <span>nat&uuml;rlich</span> <span>ohne die</span> <span>romantische Aura</span> <span>und Hindernisse zu &uuml;berwinden</span><span>.</span> <span>Daher</span> <span>scheint es mir</span><span>, dass das Ziel</span> <span>von 95% der</span> <span>IT-Experten und</span> <span>okoloaytishnikov</span> <span>genau</span> <span>ist die Tatsache</span> <span>zu &uuml;berwinden</span><span>,</span> <span>und nicht die Erf&uuml;llung</span> <span>der Aufgabe.</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5708, '146', 'WUTMARC NONFERROUS METALS', '', 'Впрочем, может, так оно и есть: ситхи из &laquo;Звёздных войн&raquo; тоже получали конечный результат проще и быстрее, чем джедаи, но, конечно, без романтического ореола и преодоления препятствий. Поэтому мне кажется, что целью 95% айтишников и околоайтишников является именно сам факт преодоления, а не выполнение поставленной задачи.', '', 1332846158, 0, 1, 1332846158, 943912800, 0, '0000-00-00 00:00:00', 4, '/contents/areas_of_activity/nonferrous_metals.jpg', '/contents/areas_of_activity/nonferrous_metals_ru.png', 0, 'WUTMARC NONFERROUS METALS', '<span id="result_box" lang="en"><span>However</span><span>, maybe</span> <span>the way it is</span><span>:</span> <span>Sith</span> <span>from "Star</span> <span>Wars</span><span>" also</span> <span>received</span> <span>the final result</span> <span>is simpler and</span> <span>faster than the</span> <span>Jedi</span><span>, but</span><span>, of course,</span> <span>without the</span> <span>romantic aura</span> <span>and overcome obstacles.</span> <span>Therefore,</span> <span>it seems to me</span> <span>that the purpose of</span> <span>95% of</span> <span>IT pros</span> <span>and</span> <span>okoloaytishnikov</span> <span>is precisely</span> <span>the fact of</span> <span>overcoming</span><span>, and</span> <span>not the fulfillment of</span> <span>the task.</span></span>', '', 'WUTMARC Nichteisenmetalle', '<span id="result_box" lang="de"><span>Aber vielleicht</span><span>, wie es ist</span><span>:</span> <span>Sith</span> <span>aus</span> <span>"Star Wars"</span> <span>erhielt auch</span> <span>das Endergebnis ist</span> <span>einfacher und schneller als</span> <span>der Jedi-Ritter</span><span>, aber</span> <span>nat&uuml;rlich</span> <span>ohne die</span> <span>romantische Aura</span> <span>und Hindernisse zu &uuml;berwinden</span><span>.</span> <span>Daher</span> <span>scheint es mir</span><span>, dass das Ziel</span> <span>von 95% der</span> <span>IT-Experten und</span> <span>okoloaytishnikov</span> <span>genau</span> <span>ist die Tatsache</span> <span>zu &uuml;berwinden</span><span>,</span> <span>und nicht die Erf&uuml;llung</span> <span>der Aufgabe.</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5709, '24', 'Продано миллион тонн стали', '', 'Принесли как-то комп починить: &laquo;Он что-то  пишет непонятное&raquo;. Включаю &mdash; не видит винта. Отрываю &mdash; винт висит в  корпусе на шлейфе, к нему прикручен китайский девайс с двумя кулерами  для охлаждения. Снимаю девайс &mdash; кулеры стоят колом, на винте некоторые  микросхемы треснули пополам от перегрева (я первый раз такое видел).', 'Принесли как-то комп починить: &laquo;Он что-то  пишет непонятное&raquo;. Включаю &mdash;  не видит винта. Отрываю &mdash; винт висит в  корпусе на шлейфе, к нему  прикручен китайский девайс с двумя кулерами  для охлаждения. Снимаю  девайс &mdash; кулеры стоят колом, на винте некоторые  микросхемы треснули  пополам от перегрева (я первый раз такое видел).Принесли как-то комп починить: &laquo;Он что-то  пишет непонятное&raquo;. Включаю &mdash;  не видит винта. Отрываю &mdash; винт висит в  корпусе на шлейфе, к нему  прикручен китайский девайс с двумя кулерами  для охлаждения. Снимаю  девайс &mdash; кулеры стоят колом, на винте некоторые  микросхемы треснули  пополам от перегрева (я первый раз такое видел).3456789', 1332922153, 0, 1, 1332922153, 943912800, 0, '0000-00-00 00:00:00', 1, '/contents/areas_of_activity/stainless_steel.jpg', '', 0, 'Sold a million tons of steel', '<span id="result_box" lang="en"><span>They brought a</span> <span>computer</span> <span>to fix</span> <span>something</span><span>, "</span><span>he</span> <span>writes something</span> <span>funny</span><span>."</span> <span>Include -</span> <span>can not see</span> <span>the screw.</span> <span>Tear off</span> <span>- the screw</span> <span>is hanging</span> <span>in the body</span> <span>in the</span> <span>loop</span><span>,</span> <span>it</span> <span>bolted</span> <span>to the</span> <span>Chinese</span> <span>device</span> <span>with two</span> <span>coolers</span> <span>for cooling.</span> <span>Hats</span> <span>device</span> <span>-</span> <span>coolers</span> <span>are</span> <span>a stake,</span> <span>some</span> <span>chips</span> <span>on the screw</span> <span>cracked</span> <span>in half</span> <span>from overheating</span> <span>(</span><span>the first time I</span> <span>saw</span> <span>this</span><span>).</span></span>', '<span id="result_box" lang="en"><span>They brought a</span> <span>computer</span> <span>to fix</span> <span>something</span><span>, "</span><span>he</span> <span>writes something</span> <span>funny</span><span>."</span> <span>Include -</span> <span>can not see</span> <span>the screw.</span> <span>Tear off</span> <span>- the screw</span> <span>is hanging</span> <span>in the body</span> <span>in the</span> <span>loop</span><span>,</span> <span>it</span> <span>bolted</span> <span>to the</span> <span>Chinese</span> <span>device</span> <span>with two</span> <span>coolers</span> <span>for cooling.</span> <span>Hats</span> <span>device</span> <span>-</span> <span>coolers</span> <span>are</span> <span>a stake,</span> <span>some</span> <span>chips</span> <span>on the screw</span> <span>cracked</span> <span>in half</span> <span>from overheating</span> <span>(</span><span>the first time I</span> <span>saw</span> <span>this</span><span>).234567890</span></span>', 'Verkauft eine Million Tonnen Stahl', '<span id="result_box" lang="de"><span>Sie brachten</span> <span>einen Computer, um</span> <span>etwas</span> <span>zu fixieren</span> <span>", schreibt er</span> <span>etwas Lustiges</span><span>."</span> <span>Einbeziehen</span> <span>-</span> <span>nicht sehen k&ouml;nnen,</span> <span>die Schraube an.</span> <span>Rei&szlig;en Sie</span> <span>-</span> <span>die Schraube</span> <span>wird im K&ouml;rper</span> <span>in der Schleife</span> <span>h&auml;ngt,</span> <span>verriegelte sie</span> <span>an die chinesische</span> <span>Ger&auml;t mit zwei</span> <span>K&uuml;hlern</span> <span>f&uuml;r die K&uuml;hlung.</span> <span>H&uuml;te</span> <span>Ger&auml;t</span> <span>-</span> <span>K&uuml;hler sind</span> <span>ein Pfahl</span><span>, einige</span> <span>Chips</span> <span>auf die Schraube</span> <span>in der Mitte</span> <span>vor &Uuml;berhitzung</span> <span>geknackt</span> <span>(das</span> <span>erste Mal sah ich</span> <span>dies</span><span>).</span></span>', '<span id="result_box" lang="de"><span>Sie brachten</span> <span>einen Computer, um</span> <span>etwas</span> <span>zu fixieren</span> <span>", schreibt er</span> <span>etwas Lustiges</span><span>."</span> <span>Einbeziehen</span> <span>-</span> <span>nicht sehen k&ouml;nnen,</span> <span>die Schraube an.</span> <span>Rei&szlig;en Sie</span> <span>-</span> <span>die Schraube</span> <span>wird im K&ouml;rper</span> <span>in der Schleife</span> <span>h&auml;ngt,</span> <span>verriegelte sie</span> <span>an die chinesische</span> <span>Ger&auml;t mit zwei</span> <span>K&uuml;hlern</span> <span>f&uuml;r die K&uuml;hlung.</span> <span>H&uuml;te</span> <span>Ger&auml;t</span> <span>-</span> <span>K&uuml;hler sind</span> <span>ein Pfahl</span><span>, einige</span> <span>Chips</span> <span>auf die Schraube</span> <span>in der Mitte</span> <span>vor &Uuml;berhitzung</span> <span>geknackt</span> <span>(das</span> <span>erste Mal sah ich</span> <span>dies</span><span>).5657689</span></span>', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `cmsmenu`
--

DROP TABLE IF EXISTS `cmsmenu`;
CREATE TABLE IF NOT EXISTS `cmsmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `title_alias` text NOT NULL,
  `link` text NOT NULL,
  `published` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `browser_nav` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=56 ;

--
-- Дамп даних таблиці `cmsmenu`
--

INSERT INTO `cmsmenu` (`id`, `parent_id`, `title`, `title_alias`, `link`, `published`, `ordering`, `checked_out`, `checked_out_time`, `browser_nav`, `image`) VALUES
(5, 0, 'Главное меню', 'mainmenu', '', 1, 2, 0, '0000-00-00 00:00:00', '0', ''),
(55, 5, 'Контакты|Contacts|Kontakte', '', '/:lang:/contacts.html', 1, 4, 0, '0000-00-00 00:00:00', '0', '/contents/mainmenu/contacts.png'),
(53, 5, 'Направления деятельности|Areas of activity|Tätigkeitsbereiche', '', '/:lang:/areas_of_activity', 1, 3, 0, '0000-00-00 00:00:00', '0', '/contents/mainmenu/services.png'),
(52, 5, 'Новости|News|Nachrichten', '', '/:lang:/news', 1, 2, 0, '0000-00-00 00:00:00', '0', '/contents/mainmenu/menu.png'),
(51, 5, 'О компани|About the company|Über das Unternehmen', '', '/:lang:/about.html', 1, 1, 0, '0000-00-00 00:00:00', '0', '/contents/mainmenu/about.png');

-- --------------------------------------------------------

--
-- Структура таблиці `cmsparams`
--

DROP TABLE IF EXISTS `cmsparams`;
CREATE TABLE IF NOT EXISTS `cmsparams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_number` int(11) NOT NULL,
  `ref_module` text NOT NULL,
  `ref_title` text NOT NULL,
  `ref_type` int(11) NOT NULL,
  `ref_src` text NOT NULL,
  `ref_srcv` int(11) NOT NULL,
  `ref_in_list` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=61 ;

--
-- Дамп даних таблиці `cmsparams`
--

INSERT INTO `cmsparams` (`id`, `ref_number`, `ref_module`, `ref_title`, `ref_type`, `ref_src`, `ref_srcv`, `ref_in_list`) VALUES
(1, 1, 'categories', 'English title', 1, '0', 0, 1),
(2, 2, 'categories', 'English description', 2, '0', 0, 0),
(3, 3, 'categories', 'Deutch title', 1, '0', 0, 1),
(4, 4, 'categories', 'Deutch description', 2, '0', 0, 0),
(5, 5, 'categories', '', 0, '', 0, 0),
(6, 6, 'categories', '', 0, '', 0, 0),
(7, 7, 'categories', '', 0, '', 0, 0),
(8, 8, 'categories', '', 0, '', 0, 0),
(9, 9, 'categories', '', 0, '', 0, 0),
(10, 10, 'categories', '', 0, '', 0, 0),
(11, 11, 'categories', '', 0, '', 0, 0),
(12, 12, 'categories', '', 0, '', 0, 0),
(13, 13, 'categories', '', 0, '', 0, 0),
(14, 14, 'categories', '', 0, '', 0, 0),
(15, 15, 'categories', '', 0, '', 0, 0),
(16, 16, 'categories', '', 0, '', 0, 0),
(17, 17, 'categories', '', 0, '', 0, 0),
(18, 18, 'categories', '', 0, '', 0, 0),
(19, 19, 'categories', '', 0, '', 0, 0),
(20, 20, 'categories', '', 0, '', 0, 0),
(21, 1, 'content', 'English title', 1, '0', 0, 1),
(22, 2, 'content', 'English introtext ', 2, '0', 0, 0),
(23, 3, 'content', 'English fulltext', 2, '0', 0, 0),
(24, 4, 'content', 'Deutch title', 1, '0', 0, 1),
(25, 5, 'content', 'Deutch introtext', 2, '0', 0, 0),
(26, 6, 'content', 'Deutch fulltext', 2, '0', 0, 0),
(27, 7, 'content', '', 0, '0', 0, 0),
(28, 8, 'content', '', 0, '0', 0, 0),
(29, 9, 'content', '', 0, '0', 0, 0),
(30, 10, 'content', '', 0, '0', 0, 0),
(31, 11, 'content', '', 0, '0', 0, 0),
(32, 12, 'content', '', 0, '0', 0, 0),
(33, 13, 'content', '', 0, '', 0, 0),
(34, 14, 'content', '', 0, '', 0, 0),
(35, 15, 'content', '', 0, '', 0, 0),
(36, 16, 'content', '', 0, '', 0, 0),
(37, 17, 'content', '', 0, '', 0, 0),
(38, 18, 'content', '', 0, '', 0, 0),
(39, 19, 'content', '', 0, '', 0, 0),
(40, 20, 'content', '', 0, '', 0, 0),
(41, 1, 'users2', '', 0, '', 0, 0),
(42, 2, 'users2', '', 0, '', 0, 0),
(43, 3, 'users2', '', 0, '', 0, 0),
(44, 4, 'users2', '', 0, '', 0, 0),
(45, 5, 'users2', '', 0, '', 0, 0),
(46, 6, 'users2', '', 0, '', 0, 0),
(47, 7, 'users2', '', 0, '', 0, 0),
(48, 8, 'users2', '', 0, '', 0, 0),
(49, 9, 'users2', '', 0, '', 0, 0),
(50, 10, 'users2', '', 0, '', 0, 0),
(51, 11, 'users2', '', 0, '', 0, 0),
(52, 12, 'users2', '', 0, '', 0, 0),
(53, 13, 'users2', '', 0, '', 0, 0),
(54, 14, 'users2', '', 0, '', 0, 0),
(55, 15, 'users2', '', 0, '', 0, 0),
(56, 16, 'users2', '', 0, '', 0, 0),
(57, 17, 'users2', '', 0, '', 0, 0),
(58, 18, 'users2', '', 0, '', 0, 0),
(59, 19, 'users2', '', 0, '', 0, 0),
(60, 20, 'users2', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `cmssession`
--

DROP TABLE IF EXISTS `cmssession`;
CREATE TABLE IF NOT EXISTS `cmssession` (
  `user_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `cmssession`
--

INSERT INTO `cmssession` (`user_id`, `session_id`) VALUES
(1, 'schotmm9ti9nnsignsufsk6rj5');

-- --------------------------------------------------------

--
-- Структура таблиці `cmsusers`
--

DROP TABLE IF EXISTS `cmsusers`;
CREATE TABLE IF NOT EXISTS `cmsusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `name` text NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `usertype` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `register_date` datetime NOT NULL,
  `lastvizit_date` datetime NOT NULL,
  `image` text NOT NULL,
  `param1` text NOT NULL,
  `param2` text NOT NULL,
  `param3` text NOT NULL,
  `param4` text NOT NULL,
  `param5` text NOT NULL,
  `param6` text NOT NULL,
  `param7` text NOT NULL,
  `param8` text NOT NULL,
  `param9` text NOT NULL,
  `param10` text NOT NULL,
  `param11` text NOT NULL,
  `param12` text NOT NULL,
  `param13` text NOT NULL,
  `param14` text NOT NULL,
  `param15` text NOT NULL,
  `param16` text NOT NULL,
  `param17` text NOT NULL,
  `param18` text NOT NULL,
  `param19` text NOT NULL,
  `param20` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `cmsusers`
--

INSERT INTO `cmsusers` (`id`, `checked_out`, `checked_out_time`, `name`, `login`, `email`, `password`, `usertype`, `block`, `register_date`, `lastvizit_date`, `image`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `param9`, `param10`, `param11`, `param12`, `param13`, `param14`, `param15`, `param16`, `param17`, `param18`, `param19`, `param20`) VALUES
(1, 0, '0000-00-00 00:00:00', '', 'admin', 'shmaliy.maxim@gmail.com', 'ce892fcaa9ba4c0a1840414c7314c138', 10, 0, '2011-02-16 11:08:09', '2012-03-30 14:47:50', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `indexation`
--

DROP TABLE IF EXISTS `indexation`;
CREATE TABLE IF NOT EXISTS `indexation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `title_hash` varchar(40) NOT NULL,
  `text` text NOT NULL,
  `prepared_text` text NOT NULL,
  `text_hash` varchar(40) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=16 ;

--
-- Дамп даних таблиці `indexation`
--

INSERT INTO `indexation` (`id`, `url`, `title`, `title_hash`, `text`, `prepared_text`, `text_hash`, `created`) VALUES
(1, '/photos/1/8', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Описание альбома', 'Описание альбома', 'e4e08a54f315c10c4f883fdedace9629', 1332029765),
(9, '/photos/1/10', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1332030001),
(10, '/contacts', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Клуб-кафе на Писаржевского \nУстанавливаю новую версу граф. драйвера nvidiaВсплывает  окно:Internet Explorer: Эта страница имеет изъян и может быть опасна!я:  кто бы говорил\n Летнее кафе в парке Шевченко Накрыла как-то ностальгия, и решил я поиграть во что-нибудь  олдскульное. Поставил известный эмулятор известной приставки, нашёл ROM и целую  субботу рубился в Shin Megami Tensei. Пройдя с треть, отправился спать, а с утра  решил продолжить. Как бы не так: эмулятор со странной избирательностью не  воспринимал клавиши.\n&nbsp; ', 'Клуб кафе Писаржевского Устанавливаю новую версу граф драйвера nvidiaВсплывает окно Internet Explorer страница имеет изъян может быть опасна говорил Летнее кафе парке Шевченко Накрыла ностальгия решил поиграть нибудь олдскульное Поставил известный эмулятор известной приставки нашёл целую субботу рубился Shin Megami Tensei Пройдя треть отправился спать утра решил продолжить эмулятор странной избирательностью воспринимал клавиши nbsp ', '2b3e80516f5a0528ff774336df9ec278', 1332160852),
(2, '/about.html', 'О нас', 'eac34b75523d2f4574ab3b9316aa2b90', 'В 1990 году поступил я в МВТУ им. Баумана и попутно  устроился работать оператором в местный вычислительный центр под названием  &laquo;Аквариум&raquo;. Только-только появились первые персоналки, и к нам как раз завезли  суперсовременные компьютеры IBM PC XT. Как водится, студенты сразу же вместо  занятий стали на них играть.Начальство поставило задачу игры запретить.  Сначала пытались бороться словесно &mdash; не помогало. Тогда я решил бороться  программно и взялся за изучение ассемблера. Через пару месяцев появился первый  продукт под названием AntiGame. Программа резидентно висела в памяти,  перехватывала запуск программ через функцию 4Bh 21 прерывания и имела базу  сигнатур различных игр &mdash; просто читался кусок данных размером 32 байта из файла  со смещением 1000h. Если запускаемая программа совпадала с одной из сигнатур, то  считалась игрой. Запуск обрывался, в буфер клавиатуры посылалось echo  y|del., проигрывалась веселая мелодия. Через месяц мелодию знали  все.Пару месяцев всё шло хорошо, база сигнатур пополнялась, студенты  ходили злые и вынуждены были заниматься делом. Но тут группа студентов тоже села  за ассемблер и через месяц хакнула мою программку. Хак быстро распространился  среди посетителей &laquo;Аквариума&raquo;, студенты снова стали довольные, играли  повсеместно, а мелодии было не слышно. Отловив и изучив хак, я выяснил, что там  тупо восстанавливался оригинальный вектор 21 прерывания, и моя программка  обламывалась.Покумекав, я взялся за клавиатуру. Спустя пару месяцев  родился шедевр под названием SuperAntiGame. Это была шедевральная программа,  написанная с использованием всех современных технологий, включая вирусные.  Частично она даже использовала неизвестный тогда механизм &laquo;стелс&raquo;, чем я до сих  пор горжусь. Программа перехватывала 13 и 21 прерывания, причём не обычным  способом, а путём внедрения в точки входа в области DOS, что делало бесполезным  восстановление оригинальных векторов прерывания. В функциях поиска, открытия и  записи файлов делалась проверка на имя файла antigame.exe и в случае  совпадения возвращалась ошибка &laquo;File not found&raquo;, так что ни один из  &laquo;коммандеров&raquo; программу не видел. Также перехватывалось прерывание таймера 1Ch &mdash;  на нём висела функция, постоянно проверяющая код в памяти. Если хотя бы один бит  был изменён, то отключалась клавиатура, запускалась мелодия, флаг read only со  всех файлов в текущем каталоге снимался, а в буфер клавиатуры отправлялось так  любимое студентами echo y|del.. Помимо этого, там было ещё множество  новаторских решений. Полный исходник занимал около 300 КБ текста,  откомпилированный файл &mdash; 9 КБ.Около года лучшие студенческие умы  безуспешно бились за право играть в игрушки и пытались взломать мою программу.  Почти год я ходил королём, пока в один прекрасный день не увидел нагло  ухмыляющегося студента, демонстративно играющего в тетрис и смотрящего на меня с  ехидцей. Моя программа была повержена.Я, конечно, не питал иллюзий и  знал, что рано или поздно это случится. К тому времени подходила к концу  разработка бета-версии нового SuperPuperAntiGame, работающего в защищённом  режиме только вышедшего тогда процессора 386SX, первые компьютеры с которым  появились в нашем &laquo;Аквариуме&raquo;.Жаль, не удалось тогда довести задуманное  до конца &mdash; увлёкся другим делом и AntiGame забросил. Но и сейчас, спустя два  десятилетия, я вспоминаю эту гонку вооружений и думаю, какой же стимул для  изучения программирования дала и сколько же талантливых программистов вырастила  жажда игр.', ' 1990 laquo raquo mdash AntiGame mdash 1000h echo laquo raquo SuperAntiGame laquo raquo antigame laquo File found raquo laquo raquo mdash read only echo mdash SuperPuperAntiGame 386SX laquo raquo mdash AntiGame ', 'd4122836aa4597a178ea97e8c87975e0', 1331407728),
(3, '/services.html', 'Услуги', '8a9ad6b42405ee04ebbb2a3dbbafa841', 'Получила как-то раз одна госконтора  федерального подчинения крупный программный продукт. Написан он был под заказ  столичными спецами, и заплачено им было весьма и весьма много. По факту  оказалось, что программа сырая и много жрущая &mdash; потребляла ресурсы нескольких  серверов, а чуть позже оказалось, что некоторые заявленные функции просто не  работают, а некоторые хоть и работают, но очень криво. Разработчики выслушали  все замечания и претензии и пообещали через год выпустить апдейт.После  того как региональные пользователи запросили совершенно новую функциональность в  рамках того, что делала московская программа, было принято писать новую  программу своими силами. За пару месяцев айтишники госконторы поговорили со  всеми пользователями, на основе их рассказов спроектировали базу данных и  выдвинули требования к будущей программе.Начали писать. За полгода  сделали. Кое-что работало кое-как, кое-что важное работало отлично, кое-что так  и осталось в стадии идей и разработки. Но программу приняли в промышленную  эксплуатацию, провели по всем документам и похвастались перед департаментом в  Москве о том, что и в провинции сидят классные разработчики. Получили  премии.Прошло ещё полгода. Москвичи выпустили обещанный апдейт, который  закрыл ряд багов и добавил функций, но так и не перекрыл очень специфические  возможности местной программки. Радостный ведущий разработчик выпустил ещё пару  обновлений и свалил в коммерческую фирму заниматься цисками.Прошел ещё  год. Московские разработчики выпустили ещё одно обновление и официально сказали:  то направление развития функциональности, о котором им писали из провинции,  некритично, и думать надо по-другому. Согласовали своё мнение в главном  департаменте госконторы и получили ещё денег по госконтракту. В региональном  филиале пользователи возмутились и заявили, что неправильно отказываться от  хороших возможностей автоматизации, и вообще, москвичи неправы. Потом оформили  все новые идеи в письмо о необходимости разработки и отправили  начальству.Начальство подумало, вспомнило о премиях за новые идеи,  согласилось и приказало программу доработать. Вот только старая версия была на  C# и MSSQL, а разработчик, которого наняли взамен старого, знал PHP и чуть-чуть  SQL. Благо все идеи о доработке сводились к созданию пары запросов. Однако срок  доработки по приказу был месячный, потому разработчик перекрестился и сделал  новую программу на PHP. Да, она выводила только результаты этих двух запросов.  Да, оформление было просто никакое, но программа работала &mdash; и работала очень  быстро. А ещё она использовала старую базу и была веб-ориентированной. Потом  разработчик предложил перевести всё на веб, потому что так модно, и через  полгода ушёл работать в крупному региональную контору.Когда вышло новое  обновление большой программы и новые замечания по местной, на должности  разработчика сидел вчерашний студент, который знал Firebird и Delphi, а ещё  очень любил линукс и открытое ПО. Примерно тогда же выяснилось, что давно  используемый MSSQL нелегальный, и денег на его легализацию не предвидится. Так  как разом отказаться от старой базы было невозможно, то пришлось для начала  писать скрипт, который копировал данные каждую ночь из старой базы в новую, и  потихоньку переписывать функциональность двух старых программ в новую  разработку. Естественно, прежде всего студент написал то, что требовало  начальство, и в тестовую эксплуатацмю ушла третья программа, которая работала с  одной задачей, но выполняла новые функции. Пользователям под роспись полетели  новые инструкции о работе с программным продуктом, и на рабочем столе каждого из  них появился очередной ярлычок.Через полгода к разработкам подключились  безопасники и потребовали внести множество изменений. Московский разработчик  отказался от проекта, предоставив госконторе развивать его дальше своими силами,  а студент уволился с тоски.', ' mdash MSSQL mdash Firebird Delphi MSSQL ', '13739143c96e53ad7a2081a67df0ca64', 1331407775);
INSERT INTO `indexation` (`id`, `url`, `title`, `title_hash`, `text`, `prepared_text`, `text_hash`, `created`) VALUES
(4, '/promotion/739', 'Хто стримує розвиток інформатизації міської ради?', '155067f85060c5b2f4c8711d01e9a9a4', '\nОстаннім  часом дніпропетровським Інтернетом й околицями гуляє розлога тема про  якісь нібито зловживання у сфері інформатизації, які вчиняються просто у  стінах Дніпропетровської міської ради "чиновниками-казнокрадами". При  цьому з регулярністю десь один раз на тиждень спливає чергова порція  "скандальних подробиць" про те, як нещасних громадян ошукують на  комп''ютерах, Інтернеті та інших малозрозумілих речах у міському  виконкомі.\nМинулого  тижня група найбільш непримиренних критиків Програми інформатизації  Дніпропетровської міської ради на 2010-2012 роки, зміни до якої були  зняті з порядку денного ХХ чергової сесії буквально за добу до її  початку, використали презентацію нового сайту міської ради, аби -  небувалий випадок - допитати начальника Управління внутрішньої політики  Володимира Михайлишина. Більш ніж сорок депутатів з різних фракцій у  присутності секретаря міської ради Максима Романенка вирішили "суворо  судити" чиновника який задумав неприпустиме - витягти інформаційне  забезпечення роботи тих таки депутатів з рівня 20 століття.\nГоловними  суддями стали позафракційний депутат Борис Васильєв та голова фракції  "Україна Майбутнього" Сергій Жуков. Нагадаємо, саме ці депутати  зауважили під час розгляду програми на комісії з депутатської діяльності, етики, законності та звуків з громадськістю,  що "у міста є більш нагальні проблеми, які потребують вирішення", ніж  витрачання 6,5 мільйонів гривень на інформатизацію діяльності тих таки  депутатів та виконкому.\nЯкщо пройтися вулицями  Дніпропетровська, яким 12 років керує "найуспішніший міський голова  України", Президент Асоціації міст України й таке інше, розумієш, що  крихта істини в тому є. І якщо в останній рік, завдяки обласному  керівництву, але аж ніяк не міському голові чи міській раді, трішки  виправилася ситуація з дорогами, то стан ЖКГ, транспорту чи, наприклад,  зелених насаджень не витримує жодної критики. Але давайте поставимо  питання у дещо іншій площині: чи потрібна місту й міській раді  інформатизація? І чи вартує вона 0,33% від річного бюджету міста?\nЩе кілька місяців тому, тоді "опозиційний" депутат Жуков підтримував давню заяву ГО ГРАД щодо непрозорості сайту міської ради та недотримання  Дніпропетровським міськвиконкомом принципів та вимог законів "Про  інформацію" та "Про доступ до публічної інформації". Він радів появі файлового серверу міської ради й засуджував неоперативність появи на ньому ж проектів  рішень міської ради. І от в новому році цей вправний юрист стає чи  найзапеклішим ворогом інформатизації. В чому причина? Чи не в тому, що  народний депутат Святослав Олійник незадовго до настання 2012 року  оголосив про припинення фінансування партії "Україна майбутнього"? Чи не нові власники вимагають від Жукова настільки неадекватної поведінки?\nАдже  давайте розберемось, проти чого так запально виступає народний  обранець. Програма інформатизації була прийнята у 2010 році під тиском  громадськості з одного боку й на вимогу регуляторних актів Верховної  Ради та Кабінету Міністрів про доступ до інформації - з іншого.\nРішення  й тоді проходило з великими труднощами, через те, що більшість  депутатів, а найбільше - люди, які приймають і підписують рішення, ні в  якому разі не хочуть, аби ці рішення побачила преса, чи не дай боже,  прості громадяни. Адже це може викликати питання типу: хто й на якій  підставі подарував кільком підприємцям землю під "Дитячим світом" і  готелем "Центральним"? А хто дозволив їх зруйнувати? З землею і  будівлями взагалі питання надскладне - у нас то архів Держкомзему  випадково згорить, то архів рішень міської ради із земельних питань  арештує прокуратура й не віддасть. І тут виявляється, що усі (ви  вдумайтесь УСІ рішення, з прізвищами, ініціаторами та виконавцями) мають  стати доступними громадськості!\nПрограму  в 2010 прийняли із застереженнями, курувати її виконання був  призначений керуючий справами виконкому Віталій Мархасін, який навіть  щось там закупив і певну модернізацію провів. На яких підставах -  питання до нього, хоча затверджуючи звіт про виконання бюджету 2010 року  депутати міської ради, у числі яких Сергій Жуков, цим питанням не  перейнялися.\nАле  ані у 2010 році, коли було освоєно лише 193 тисячі гривень, ані у 2011,  коли цю сума зросла до майже двох мільйонів, не було вирішено  кардинально низку проблем, згадувати про які депутати не воліють.  Насамперед, в будівлі міської ради досі не існує централізованої, а  відтак керованої і захищеної локальної мережі. Тобто мережі існують - чи  не в межах кожного департаменту й управління, але в загальну систему  всі комп''ютери не об''єднані. Ба більше ніхто у міській раді&nbsp; на  сьогодні навіть не може сказати, скільки загалом точок входу у мережу  міської ради існує, адже депутати й деякі високопосадовці мають чудову  манеру приносити на роботу й працювати на власних мобільних ЕОМ, безпеку  яких і встановлене програмне забезпечення ніхто не контролює.\nВідповідно,  не існує забезпечення каналу зв''язку Дніпропетровської міської ради з  навколишнім світом. Тобто, знову ж таки, таких каналів безліч, але  більша частина - "невеличкі презенти" від "соціально свідомих  бізнесменів". Про яку безпеку й захист може йти мова, якщо вся вищі  чиновники в місті, включно з міським головою, отримують доступ до  світових мереж по каналах, контрольованих приватними компаніями!?\nКількість  і пропускна здатність цих каналів значно вища, ніж у існуючого  загального каналу міської ради у 5 Мбіт/секунду, через який близько 500  працівників мають доступ до зовнішнього світу й близько 2000-3000  користувачів ззовні отримують доступ до офіційного сайт міської ради та  її серверів. Погано й повільно працює сайт міської ради? А чому ж ви  дивуєтеся? Сьогодні користувачі з домашнім Інтернетом використовують  швидкість від 1 до 100 Мбіт/секунду. А весь міськвиконком разом із  сайтом - 5. "Крадій" Михайлишин запропонував збільшити цей канал до 20  Мбіт/секунду - одразу почалася обструкція й розмови про "більш нагальні  проблеми".\nЗгадаймо  ще один аспект, який ставить дніпропетровську міську раду в ряд сіл й  віддалених районних центрів: чиновники Дніпропетровська ведуть офіційну  переписку через адреси безкоштовних Інтернет-служб! Це у 2012 році!  Прес-секретар міської&nbsp; ради (вдумайтеся!) щоденно розсилає офіційну інформацію до майже двохсот ЗМІ міста та України через адресу на MAIL.RU. І це не виняток. Наші чиновники не розуміють, що надсилання листа від депутата чи міського голови з адреси типу kulich@ukr.net або lena62@bk.ru - страшенна ганьба і жодною перепискою, крім особистої, вважатися не може! Чиновник повинен мати електронну адресу формату zhukovS@dniprorada.gov.ua -  і ніяк інакше, на цю адресу громадяни, ЗМІ чи інші організації  надсилають листи, які носять силу офіційного звернення, на яке чиновник  зобов''язаний відповісти протягом п''яти діб. Але щоб така пошта існувала,  необхідно програмне забезпечення, відповідні сервери пошти (майже 1000  скриньок плюс архів) та оплата праці людині, яка все це буде виконувати.  Але надто принципові депутати проти - це ж треба буде відповідати на  питання всіх цих людей, які нас обрали і від яких ми так вміло  відсторонилися...\nАле повернімось у минулий четвер до сесійної зали Дніпропетровської міської ради, де депутати начебто&nbsp; "вивели  на чисту воду" начальника управління внутрішньої політики. Як  з''ясувалося, у більшої частини депутатів претензій до сайту міської ради  немає. Після модернізації він став швидшим, нагляднішим і естетично  чистішим. З усіх висловлених критичних зауважень на себе звернули увагу  лише недостатність інформації про діяльність депутатів, порожній і від  того непривабливий розділ інвестиційної діяльності та незадовільне  оформлення версії сайту англійською мовою.\nМи  не беремось заперечувати чиїсь враження, але на тій самій презентації  пан Михайлишин запросив депутатські комісії активніше працювати й  висвітлювати свою діяльність. Питання ж інвестицій чи англомовна версія  сайту взагалі не є компетенцією управління внутрішньої політики. "Ви  хотіли функціональний і швидкий сайт - отримуйте! Мало інформації -  наповнюйте!" \nПрисутні  депутати, у тому числі й Борис Васильєв, який виступав у ролі і  депутата, і журналіста, погодилися з поясненнями й щодо розмежування  повноважень, адже кожен з розділів міського сайту має наповнювати певний  департамент чи управління. Так, новини вивішує прес-служба, а файли  проектів рішень - Департамент забезпечення діяльності міської ради.\nДеякі  депутати наголосили на не дуже зручному пошуку в межах файлового  серверу, але тут знову ж таки необхідне фінансування. Аби привести  нормативну базу рішень Дніпропетровської міської ради до вигляду парламентської,  необхідно знову ж таки створити базу даних, перевести всі документи в  електронний вигляд, створити рубрикатор, розробити регламент роботи з  такими документами, а найголовніше - навчити персонал. Це завдання тісно  пов''язане з впровадженням цифрового підпису й електронного  документообігу, чого, до речі, також вимагає від місцевої влади не  тільки час, але і Кабмін. Ціна питання - 590 тисяч гривень. Забагато?  Дивлячись з чим порівнювати. \nАдже  в разі забезпечення публічності рішень міської ради можна щорічно  заощаджувати не мільйони навіть - мільярди, просто блокуючи рішення,  спрямовані на грабунок громади міста. Електронний документообіг при  рівні сучасної бюрократії (кожне рішення міської ради має лист  погодження з 18 - 27 підписів) скоротить проходження рішень через  виконком з існуючих 2-3 місяців до 15-30 хвилин. При цьому можна буде  скоротити 50-60% персоналу, зайнятого виключно перекладанням паперів з  теки в теку й носінням цих паперів коридорами міської ради.\nАле  хіба в Дніпропетровську комусь вигідно прийняття рішень протягом  півгодини і припинення носіння паперів, а разом із нею і "вдячності"  фігурантів рішень тим чи іншим чиновникам чи головам депутатських  комісій? Вже аж ніяк головам цих самих комісій.\nНа  наступній сесії міської ради, призначеній на 29 лютого, рішення про  зміни до Програми інформатизації, скоріш за все, знову відхилять. Цього  разу критики міського сайту зауважили на нібито "гумористичний" елемент  захисту адміністративного входу на сайт. Насправді даний елемент виконує  частину захисту від роботів-шпигунів, а загалом оновлений сайт міської  ради захищений чи не найкраще від інших державних ресурсів. Принаймні на  хвилі повалень сайтів Президента, міністерств та відомств, включно з  СБУ, дві поспіль атаки, здійснені на сайт Дніпропетровської міськради  протягом останнього тижня, не завдали шкоди його функціонуванню. \nНеоднозначна  реакція депутатів на суму, закладену у Програмі на модернізацію сайту  міської ради - 140 тисяч гривень - була погашена секретарем міськради  Максимом Романенком. Він довів до відома зібрання, що ніякі 140 тисяч за  виконану роботу ніхто поки що нікому не платив. Тай дивно було б - адже  виконавці надали для тестування пробну версію оновленого сайту. Не  йшлося ще ані про акти виконаних робіт, ані про підписання платіжок.\nА  ще у програмі - зв''язок будівлі міської ради з віддаленими підрозділами  виконкому (Єдиний дозвільний центр на проспекті Правди 42, районні у  місті ради, тощо), забезпечення джерел безперервного живлення,  забезпечення окремої серверної кімнати з кодовим замком, вентиляцією і  двома джерелами живлення і так далі. Є там і засоби для мультимедійних  та он-лайн трансляцій сесії міської ради. Дивина: у маленькому й бідному  Тернополі всі сесії міської та обласної рад транслюються телебаченням,  а у багатому й розвиненому Дніпропетровську немає 507 тисяч гривень,  аби забезпечити трансляцію і паралельне зберігання фонограми.\nРішення,  чи залишатися у кам''яному віці інформатизації з паперовим  документообігом, чи слідувати вимогам часу й забезпечити діяльність  виконавчої влади хоча б у відповідності до вимог Уряду, приймуть  неодмінно, самі депутати. Але при цьому не завадило б відповісти й на  наступне питання - чи ці люди відстоюють інтереси громади, чи все ж таки  переслідують свої особисті інтереси свої, а може відстоюють право й  далі ловити рибу в непрозорій воді інформаційного безладу?\n', ' Останнім часом дніпропетровським Інтернетом околицями гуляє розлога тема якісь нібито зловживання сфері інформатизації вчиняються просто стінах Дніпропетровської міської ради чиновниками казнокрадами цьому регулярністю десь один тиждень спливає чергова порція скандальних подробиць нещасних громадян ошукують комп ютерах Інтернеті інших малозрозумілих речах міському виконкомі Минулого тижня група найбільш непримиренних критиків Програми інформатизації Дніпропетровської міської ради 2010 2012 роки зміни якої були зняті порядку денного чергової сесії буквально добу початку використали презентацію нового сайту міської ради небувалий випадок допитати начальника Управління внутрішньої політики Володимира Михайлишина Більш сорок депутатів різних фракцій присутності секретаря міської ради Максима Романенка вирішили суворо судити чиновника який задумав неприпустиме витягти інформаційне забезпечення роботи таки депутатів рівня століття Головними суддями стали позафракційний депутат Борис Васильєв голова фракції Україна Майбутнього Сергій Жуков Нагадаємо саме депутати зауважили розгляду програми комісії депутатської діяльності етики законності звуків громадськістю міста більш нагальні проблеми потребують вирішення витрачання мільйонів гривень інформатизацію діяльності таки депутатів виконкому Якщо пройтися вулицями Дніпропетровська яким років керує найуспішніший міський голова України Президент Асоціації міст України таке інше розумієш крихта істини тому якщо останній завдяки обласному керівництву ніяк міському голові міській раді трішки виправилася ситуація дорогами стан транспорту наприклад зелених насаджень витримує жодної критики давайте поставимо питання дещо іншій площині потрібна місту міській раді інформатизація вартує вона річного бюджету міста кілька місяців тому тоді опозиційний депутат Жуков підтримував давню заяву ГРАД щодо непрозорості сайту міської ради недотримання Дніпропетровським міськвиконкомом принципів вимог законів інформацію доступ публічної інформації радів появі файлового серверу міської ради засуджував неоперативність появи ньому проектів рішень міської ради новому році вправний юрист стає найзапеклішим ворогом інформатизації чому причина тому народний депутат Святослав Олійник незадовго настання 2012 року оголосив припинення фінансування партії Україна майбутнього нові власники вимагають Жукова настільки неадекватної поведінки Адже давайте розберемось проти чого запально виступає народний обранець Програма інформатизації була прийнята 2010 році тиском громадськості одного боку вимогу регуляторних актів Верховної Ради Кабінету Міністрів доступ інформації іншого Рішення тоді проходило великими труднощами через більшість депутатів найбільше люди приймають підписують рішення якому разі хочуть рішення побачила преса боже прості громадяни Адже може викликати питання типу якій підставі подарував кільком підприємцям землю Дитячим світом готелем Центральним дозволив зруйнувати землею будівлями взагалі питання надскладне архів Держкомзему випадково згорить архів рішень міської ради земельних питань арештує прокуратура віддасть виявляється вдумайтесь рішення прізвищами ініціаторами виконавцями мають стати доступними громадськості Програму 2010 прийняли застереженнями курувати виконання призначений керуючий справами виконкому Віталій Мархасін який навіть щось закупив певну модернізацію провів яких підставах питання нього хоча затверджуючи звіт виконання бюджету 2010 року депутати міської ради числі яких Сергій Жуков питанням перейнялися 2010 році коли було освоєно лише тисячі гривень 2011 коли сума зросла майже двох мільйонів було вирішено кардинально низку проблем згадувати депутати воліють Насамперед будівлі міської ради досі існує централізованої відтак керованої захищеної локальної мережі Тобто мережі існують межах кожного департаменту управління загальну систему комп ютери єднані більше ніхто міській раді nbsp сьогодні навіть може сказати скільки загалом точок входу мережу міської ради існує адже депутати деякі високопосадовці мають чудову манеру приносити роботу працювати власних мобільних безпеку яких встановлене програмне забезпечення ніхто контролює Відповідно існує забезпечення каналу язку Дніпропетровської міської ради навколишнім світом Тобто знову таки таких каналів безліч більша частина невеличкі презенти соціально свідомих бізнесменів безпеку захист може мова якщо вищі чиновники місті включно міським головою отримують доступ світових мереж каналах контрольованих приватними компаніями Кількість пропускна здатність каналів значно вища існуючого загального каналу міської ради Мбіт секунду через який близько працівників мають доступ зовнішнього світу близько 2000 3000 користувачів ззовні отримують доступ офіційного сайт міської ради серверів Погано повільно працює сайт міської ради чому дивуєтеся Сьогодні користувачі домашнім Інтернетом використовують швидкість Мбіт секунду весь міськвиконком разом сайтом Крадій Михайлишин запропонував збільшити канал Мбіт секунду одразу почалася обструкція розмови більш нагальні проблеми Згадаймо один аспект який ставить дніпропетровську міську раду віддалених районних центрів чиновники Дніпропетровська ведуть офіційну переписку через адреси безкоштовних Інтернет служб 2012 році Прес секретар міської nbsp ради вдумайтеся щоденно розсилає офіційну інформацію майже двохсот міста України через адресу MAIL виняток Наші чиновники розуміють надсилання листа депутата міського голови адреси типу kulich lena62 страшенна ганьба жодною перепискою крім особистої вважатися може Чиновник повинен мати електронну адресу формату zhukovS dniprorada ніяк інакше адресу громадяни інші організації надсилають листи носять силу офіційного звернення чиновник зобов язаний відповісти протягом така пошта існувала необхідно програмне забезпечення відповідні сервери пошти майже 1000 скриньок плюс архів оплата праці людині буде виконувати надто принципові депутати проти треба буде відповідати питання всіх людей обрали яких вміло відсторонилися повернімось минулий четвер сесійної зали Дніпропетровської міської ради депутати начебто nbsp вивели чисту воду начальника управління внутрішньої політики ясувалося більшої частини депутатів претензій сайту міської ради немає Після модернізації став швидшим нагляднішим естетично чистішим усіх висловлених критичних зауважень себе звернули увагу лише недостатність інформації діяльність депутатів порожній того непривабливий розділ інвестиційної діяльності незадовільне оформлення версії сайту англійською мовою беремось заперечувати чиїсь враження самій презентації Михайлишин запросив депутатські комісії активніше працювати висвітлювати свою діяльність Питання інвестицій англомовна версія сайту взагалі компетенцією управління внутрішньої політики хотіли функціональний швидкий сайт отримуйте Мало інформації наповнюйте Присутні депутати тому числі Борис Васильєв який виступав ролі депутата журналіста погодилися поясненнями щодо розмежування повноважень адже кожен розділів міського сайту наповнювати певний департамент управління новини вивішує прес служба файли проектів рішень Департамент забезпечення діяльності міської ради Деякі депутати наголосили дуже зручному пошуку межах файлового серверу знову таки необхідне фінансування привести нормативну базу рішень Дніпропетровської міської ради вигляду парламентської необхідно знову таки створити базу даних перевести документи електронний вигляд створити рубрикатор розробити регламент роботи такими документами найголовніше навчити персонал завдання тісно язане впровадженням цифрового підпису електронного документообігу чого речі також вимагає місцевої влади тільки Кабмін Ціна питання тисяч гривень Забагато Дивлячись порівнювати Адже разі забезпечення публічності рішень міської ради можна щорічно заощаджувати мільйони навіть мільярди просто блокуючи рішення спрямовані грабунок громади міста Електронний документообіг рівні сучасної бюрократії кожне рішення міської ради лист погодження підписів скоротить проходження рішень через виконком існуючих місяців хвилин цьому можна буде скоротити персоналу зайнятого виключно перекладанням паперів теки теку носінням паперів коридорами міської ради хіба Дніпропетровську комусь вигідно прийняття рішень протягом півгодини припинення носіння паперів разом вдячності фігурантів рішень іншим чиновникам головам депутатських комісій ніяк головам самих комісій наступній сесії міської ради призначеній лютого рішення зміни Програми інформатизації скоріш знову відхилять Цього разу критики міського сайту зауважили нібито гумористичний елемент захисту адміністративного входу сайт Насправді даний елемент виконує частину захисту роботів шпигунів загалом оновлений сайт міської ради захищений найкраще інших державних ресурсів Принаймні хвилі повалень сайтів Президента міністерств відомств включно поспіль атаки здійснені сайт Дніпропетровської міськради протягом останнього тижня завдали шкоди його функціонуванню Неоднозначна реакція депутатів суму закладену Програмі модернізацію сайту міської ради тисяч гривень була погашена секретарем міськради Максимом Романенком довів відома зібрання ніякі тисяч виконану роботу ніхто поки нікому платив дивно було адже виконавці надали тестування пробну версію оновленого сайту йшлося акти виконаних робіт підписання платіжок програмі язок будівлі міської ради віддаленими підрозділами виконкому Єдиний дозвільний центр проспекті Правди районні місті ради тощо забезпечення джерел безперервного живлення забезпечення окремої серверної кімнати кодовим замком вентиляцією двома джерелами живлення далі засоби мультимедійних лайн трансляцій сесії міської ради Дивина маленькому бідному Тернополі сесії міської обласної транслюються телебаченням багатому розвиненому Дніпропетровську немає тисяч гривень забезпечити трансляцію паралельне зберігання фонограми Рішення залишатися яному віці інформатизації паперовим документообігом слідувати вимогам часу забезпечити діяльність виконавчої влади хоча відповідності вимог Уряду приймуть неодмінно самі депутати цьому завадило відповісти наступне питання люди відстоюють інтереси громади таки переслідують свої особисті інтереси свої може відстоюють право далі ловити рибу непрозорій воді інформаційного безладу ', '934304efe04a6b48f885d874acfd5189', 1331547781),
(5, '/news/721', '"Дніпро" розгромив іспанців з різницею у 9 голів', '615acd527e88c19270f49542c1f57ccc', 'Дніпропетровський "Дніпро" провів перший товариський матч на зборі в  іспанському Кампоаморі. Підопічні Хуанде Рамоса потренувалися на команді  однієї з регіональних ліг Іспанії "Хорададі", для гравців якої футбол  це хобі.\nПро те, що "Дніпро" і "Хорадада" знаходяться на  абсолютно різних футбольних орбітах, красномовно говорить хоча б той  факт, що голкіпер дніпропетровців Ігор Варцаба лише по разу торкнувся  м''яча в кожному таймі. А "Дніпро" провів дуже багато небезпечних атак і  міг забити м''ячів 20, але обмежився дев''ятьма.\nРоман Зозуля забив  тричі. По два голи записали на свій рахунок Нікола Калініч і Матеус. По  голу забили Джуліано та Євген Коноплянка.\nДНІПРО - ХОРАДАДА - 9:0\nДніпро:  91. Варцаба, 3. Мазух (5. Мандзюк, 46), 7. Кулаков (8. Джуліано, 46),  11. Олійник (10. Коноплянка, 46), 14. Чеберячко, 17. Стрініч, 18.  Зозуля, 24. Пашаєв, 29. Ротань (4. Кравченко, 46), 30. Шахов (36.  Бабенко, 46), 99. Матеус (9. Калініч, 46)\nХорадада:  1. Крістіан, 2. Кампільо, 3. Антоніо, 4. Роха, 5. Обама (12. Кіке, 38),  6. Фернандес (16. Льюіс, 41), 7. Маріо, 8. Хосе Марія, 9. Пелегрін, 10.  Хаві, 11. Еней (14. Альфонсо, 20)\nГоли:&nbsp;Зозуля 3,&nbsp;13, 60; Матеус 21, 43; Калініч 53, 87; Джуліано 70; Коноплянка 73', 'Дніпропетровський Дніпро провів перший товариський матч зборі іспанському Кампоаморі Підопічні Хуанде Рамоса потренувалися команді однієї регіональних Іспанії Хорададі гравців якої футбол хобі Дніпро Хорадада знаходяться абсолютно різних футбольних орбітах красномовно говорить хоча факт голкіпер дніпропетровців Ігор Варцаба лише разу торкнувся кожному таймі Дніпро провів дуже багато небезпечних атак забити ячів обмежився ятьма Роман Зозуля забив тричі голи записали свій рахунок Нікола Калініч Матеус голу забили Джуліано Євген Коноплянка ДНІПРО ХОРАДАДА Дніпро Варцаба Мазух Мандзюк Кулаков Джуліано Олійник Коноплянка Чеберячко Стрініч Зозуля Пашаєв Ротань Кравченко Шахов Бабенко Матеус Калініч Хорадада Крістіан Кампільо Антоніо Роха Обама Кіке Фернандес Льюіс Маріо Хосе Марія Пелегрін Хаві Еней Альфонсо Голи nbsp Зозуля nbsp Матеус Калініч Джуліано Коноплянка ', 'a5f2c08e90c5c6fbe9c8deaed83aeaf6', 1331548683),
(6, '/contacts.html', 'Контактная информация', '2776ff5c643b4e823445028d35d516a3', 'Я своему ребёнку сказал, что разрешу пользоваться  компьютером, только если он его сам соберёт. Думал, сразу охладеет к этой идее,  а он у друзей настрелял старых комплектующих, даже монитор выпросил &mdash; и с горем  пополам собрал. Школу недавно перевели на линукс, и на самодельный комп сын  поставил его же.Рутовый пароль я узнал сразу &mdash; прочитал надпись  карандашом на боку монитора. Потом отправил сынку сообщение якобы от лица  провайдера о переходе на тарифный план, при котором интернет будут обрубать  каждый день с 21:00 и на всю ночь. Дальше &mdash; дело техники. Написал маленькую  программку, которая каждый день ровно в 21:00 подключается к самоделке по  телнету и отправляет команду ifconfig eth0 down. Пока подвоха сын не  обнаружил.', ' своему ребёнку сказал разрешу пользоваться компьютером только если соберёт Думал сразу охладеет этой идее друзей настрелял старых комплектующих даже монитор выпросил mdash горем пополам собрал Школу недавно перевели линукс самодельный комп поставил Рутовый пароль узнал сразу mdash прочитал надпись карандашом боку монитора Потом отправил сынку сообщение якобы лица провайдера переходе тарифный план котором интернет будут обрубать каждый день ночь Дальше mdash дело техники Написал маленькую программку которая каждый день ровно подключается самоделке телнету отправляет команду ifconfig eth0 down Пока подвоха обнаружил ', '35251e0858c4bd692cb3ecca05490cc2', 1331554249),
(7, '/photos/1/arhXIB', 'День искренности и заоблачных чувств', 'b72d8251f380edb830a0d4da1f3b1e69', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1331554296),
(8, '/news/729', 'Звільнити вулиці від імен катів обіцяють на найближчій сесії міськради', '9505aea298a6d83217ce3f1b9d6fa447', 'Після&nbsp;пікету&nbsp;за  перейменування вулиць Косіора, Чубаря і Постишева керуючий справами  виконкому Дніпропетровської міськради Микола Отченко провів зустріч з  головою Дніпропетровської міської організації ВО &laquo;Свобода&raquo; Андрієм  Денисенком. \nЗа  словами Денисенка, чиновник зазначив, що політична воля на  перейменування цих вулиць у міськраді є, та запевнив, що відповідне  питання має бути винесене і розглянуте на найближчій сесії міськради.  Вона запланована на 29 лютого.\nЯк  повідомляв Дніпроград, рішення щодо зміни назв вулиць знайшло розуміння  у депутатській комісії з питань топоніміки, затверджене виконкомом  міської ради. Вулиці Косіора пропонують повернути попередню назву -  Бульварна, Постишева - льотчика Попкова, Чубаря - назвати на честь  останнього дніпровського лоцмана Омельченка - засновника музею  лоцманства, краєзнавця, патріота.', ' nbsp nbsp laquo raquo ', '5d31b53668d566d0b619c79ec050d974', 1331631709);
INSERT INTO `indexation` (`id`, `url`, `title`, `title_hash`, `text`, `prepared_text`, `text_hash`, `created`) VALUES
(11, '/contacts?name=&email=&phone=&comment=&captcha%5Bid%5D=397a88b731b931e3f2a6d4ab7d204d91&captcha%5Binput%5D=&submit=%CE%F2%EF%F0%E0%E2%E8%F2%FC', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Клуб-кафе на Писаржевского \nУстанавливаю новую версу граф. драйвера nvidiaВсплывает  окно:Internet Explorer: Эта страница имеет изъян и может быть опасна!я:  кто бы говорил\n Летнее кафе в парке Шевченко Накрыла как-то ностальгия, и решил я поиграть во что-нибудь  олдскульное. Поставил известный эмулятор известной приставки, нашёл ROM и целую  субботу рубился в Shin Megami Tensei. Пройдя с треть, отправился спать, а с утра  решил продолжить. Как бы не так: эмулятор со странной избирательностью не  воспринимал клавиши.\n&nbsp; ', 'Клуб кафе Писаржевского Устанавливаю новую версу граф драйвера nvidiaВсплывает окно Internet Explorer страница имеет изъян может быть опасна говорил Летнее кафе парке Шевченко Накрыла ностальгия решил поиграть нибудь олдскульное Поставил известный эмулятор известной приставки нашёл целую субботу рубился Shin Megami Tensei Пройдя треть отправился спать утра решил продолжить эмулятор странной избирательностью воспринимал клавиши nbsp ', '2b3e80516f5a0528ff774336df9ec278', 1332161931),
(12, '/contacts?name=&email=&phone=&comment=&captcha%5Bid%5D=590483a464f2e8c51be979d1fddfc0d2&captcha%5Binput%5D=&submit=%CE%F2%EF%F0%E0%E2%E8%F2%FC', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Клуб-кафе на Писаржевского \nУстанавливаю новую версу граф. драйвера nvidiaВсплывает  окно:Internet Explorer: Эта страница имеет изъян и может быть опасна!я:  кто бы говорил\n Летнее кафе в парке Шевченко Накрыла как-то ностальгия, и решил я поиграть во что-нибудь  олдскульное. Поставил известный эмулятор известной приставки, нашёл ROM и целую  субботу рубился в Shin Megami Tensei. Пройдя с треть, отправился спать, а с утра  решил продолжить. Как бы не так: эмулятор со странной избирательностью не  воспринимал клавиши.\n&nbsp; ', 'Клуб кафе Писаржевского Устанавливаю новую версу граф драйвера nvidiaВсплывает окно Internet Explorer страница имеет изъян может быть опасна говорил Летнее кафе парке Шевченко Накрыла ностальгия решил поиграть нибудь олдскульное Поставил известный эмулятор известной приставки нашёл целую субботу рубился Shin Megami Tensei Пройдя треть отправился спать утра решил продолжить эмулятор странной избирательностью воспринимал клавиши nbsp ', '2b3e80516f5a0528ff774336df9ec278', 1332161966),
(13, '/services', 'Услуги', '8a9ad6b42405ee04ebbb2a3dbbafa841', 'Получила как-то раз одна госконтора  федерального подчинения крупный программный продукт. Написан он был под заказ  столичными спецами, и заплачено им было весьма и весьма много. По факту  оказалось, что программа сырая и много жрущая &mdash; потребляла ресурсы нескольких  серверов, а чуть позже оказалось, что некоторые заявленные функции просто не  работают, а некоторые хоть и работают, но очень криво. Разработчики выслушали  все замечания и претензии и пообещали через год выпустить апдейт.', 'Получила одна госконтора федерального подчинения крупный программный продукт Написан заказ столичными спецами заплачено было весьма весьма много факту оказалось программа сырая много жрущая mdash потребляла ресурсы нескольких серверов чуть позже оказалось некоторые заявленные функции просто работают некоторые хоть работают очень криво Разработчики выслушали замечания претензии пообещали через выпустить апдейт ', '9ffe032707590d1e0f3aa32a7b1c182e', 1332245209),
(14, '/services/5701', 'Изготовление тортов на заказ', 'a9bc112b65f032d1eff49b3418d7c02f', 'Пользователи пугаются &laquo;дружественного&raquo; интерфейса новой версии программы?  Разработчики и внедряльщики этого дела сейчас скажут: &laquo;Мы их из хрущёвки в  небоскрёб переселяем, а они не хотят &mdash; привыкли, что сортир в другом углу  квартиры, да и лифта побаиваются&raquo;.', 'Пользователи пугаются laquo дружественного raquo интерфейса новой версии программы Разработчики внедряльщики этого дела сейчас скажут laquo хрущёвки небоскрёб переселяем хотят mdash привыкли сортир другом углу квартиры лифта побаиваются raquo ', '773de8cba90ed8888c90d44753bae2f7', 1332247541),
(15, '/photos/1/82012', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 1332259739);

-- --------------------------------------------------------

--
-- Структура таблиці `regions_gorod`
--

DROP TABLE IF EXISTS `regions_gorod`;
CREATE TABLE IF NOT EXISTS `regions_gorod` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `obl_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=407 ;

--
-- Дамп даних таблиці `regions_gorod`
--

INSERT INTO `regions_gorod` (`id`, `obl_id`, `title`, `latitude`, `longitude`) VALUES
(1, 26, 'Алупка', '44.4197222', '34.0430556'),
(2, 26, 'Алушта', '44.6637211', '34.405013'),
(3, 26, 'Армянск', '46.1072222', '33.6933333'),
(4, 26, 'Бахчисарай', '44.7527778', '33.8608333'),
(5, 26, 'Белогорск', '45.0544444', '34.6022222'),
(6, 26, 'Джанкой', '45.7086111', '34.3933333'),
(7, 26, 'Евпатория', '45.2036111', '33.3613889'),
(8, 26, 'Керчь', '45.33786', '36.458401'),
(9, 26, 'Красноперекопск', '45.962849', '33.787121'),
(10, 26, 'Саки', '45.1336111', '33.5772222'),
(11, 26, 'Симферополь', '44.9480556', '34.1041667'),
(12, 26, 'Старый Крым', '45.0291667', '35.0886111'),
(13, 26, 'Судак', '44.858799', '34.974979'),
(14, 26, 'Феодосия', '45.0488889', '35.3791667'),
(15, 26, 'Щёлкино', '45.4281023', '35.8165187'),
(16, 26, 'Ялта', '44.4994444', '34.1552778'),
(17, 27, 'Бар', '49.630283', '27.001648'),
(18, 27, 'Бершадь', '48.368954', '29.5331654'),
(19, 27, 'Винница', '49.2333333', '28.4833333'),
(20, 27, 'Гайсин', '48.8094444', '29.3905556'),
(21, 27, 'Жмеринка', '49.038349', '28.10556'),
(22, 27, 'Казатин', '49.711769', '28.842859'),
(23, 27, 'Калиновка', '49.4472222', '28.5230556'),
(24, 27, 'Ладыжин', '48.676151', '29.262541'),
(25, 27, 'Могилёв-Подольский', '48.45', '27.8'),
(26, 27, 'Немиров', '48.9726621', '28.835666'),
(27, 27, 'Погребище', '49.4833333', '29.2666667'),
(28, 27, 'Тульчин', '48.68', '28.87'),
(29, 27, 'Хмельник', '49.563469', '27.959379'),
(30, 27, 'Шаргород', '48.73761', '28.08688'),
(31, 27, 'Ямполь', '49.9572775', '26.2290711'),
(32, 28, 'Берестечко', '50.3505636', '25.1007738'),
(33, 28, 'Владимир-Волынский', '50.853578', '24.311783'),
(34, 28, 'Горохов', '50.500622', '24.767559'),
(35, 28, 'Камень-Каширский', '51.6241667', '24.9605556'),
(36, 28, 'Киверцы', '50.833621', '25.460706'),
(37, 28, 'Ковель', '51.212898', '24.71343'),
(38, 28, 'Луцк', '50.75', '25.3358333'),
(39, 28, 'Любомль', '51.2230556', '24.0377778'),
(40, 28, 'Нововолынск', '50.7333333', '24.1666667'),
(41, 28, 'Рожище', '50.915901', '25.268551'),
(42, 28, 'Устилуг', '50.86', '24.15'),
(43, 29, 'Апостолово', '47.65815', '33.697819'),
(44, 29, 'Верхнеднепровск', '48.6561111', '34.3283333'),
(45, 29, 'Вольногорск', '48.4833333', '34.0166667'),
(46, 29, 'Днепродзержинск', '48.5166667', '34.6166667'),
(47, 29, 'Днепропетровск', '48.45', '34.9833333'),
(48, 29, 'Жёлтые Воды', '48.35', '33.5'),
(49, 29, 'Кривой Рог', '47.899726', '33.379534'),
(50, 29, 'Марганец', '47.6397222', '34.6363889'),
(51, 29, 'Никополь', '47.5666667', '34.4'),
(52, 29, 'Новомосковск', '48.6333333', '35.2166667'),
(53, 29, 'Орджоникидзе', '44.9643961', '35.3569007'),
(54, 29, 'Павлоград', '48.533939', '35.869282'),
(55, 29, 'Перещепино', '49.016251', '35.371681'),
(56, 29, 'Першотравенск', '48.3463889', '36.4044444'),
(57, 29, 'Подгородное', '49.5355598', '25.5276081'),
(58, 29, 'Пятихатки', '48.4113889', '33.7105556'),
(59, 29, 'Синельниково', '48.3177778', '35.5119444'),
(60, 29, 'Терновка', '48.5402778', '29.9677778'),
(61, 30, 'Авдеевка', '48.1333333', '37.7333333'),
(62, 30, 'Артёмовск', '48.599072', '37.999241'),
(63, 30, 'Волноваха', '47.596119', '37.490429'),
(64, 30, 'Горловка', '48.346432', '38.059513'),
(65, 30, 'Дзержинск', '48.4', '37.8333333'),
(66, 30, 'Дебальцево', '48.3333333', '38.4'),
(67, 30, 'Димитров', '48.32357', '37.291854'),
(68, 30, 'Доброполье', '48.4691324', '37.0871223'),
(69, 30, 'Докучаевск', '47.770821', '37.684361'),
(70, 30, 'Донецк', '48.0027778', '37.8052778'),
(71, 30, 'Дружковка', '48.6166667', '37.5333333'),
(72, 30, 'Енакиево', '48.2166667', '38.2'),
(73, 30, 'Ждановка', '48.1462985', '38.2540176'),
(74, 30, 'Зугрэс', '48.0166667', '38.2666667'),
(75, 30, 'Кировское', '48.15', '38.3666667'),
(76, 30, 'Краматорск', '48.736462', '37.57164'),
(77, 30, 'Красноармейск', '48.2827778', '37.1827778'),
(78, 30, 'Красный Лиман', '48.984211', '37.810329'),
(79, 30, 'Константиновка', '48.51545', '37.703629'),
(80, 30, 'Мариуполь', '47.1166667', '37.55'),
(81, 30, 'Макеевка', '48.076179', '38.068427'),
(82, 30, 'Новогродовка', '48.2045408', '37.336821'),
(83, 30, 'Селидово', '48.144671', '37.297897'),
(84, 30, 'Славянск', '48.846851', '37.57954'),
(85, 30, 'Снежное', '48.0282789', '38.7656122'),
(86, 30, 'Соледар', '48.6833333', '38.1'),
(87, 30, 'Торез', '48.0166667', '38.6333333'),
(88, 30, 'Угледар', '47.7833333', '37.25'),
(89, 30, 'Харцызск', '48.037411', '38.160301'),
(90, 30, 'Шахтёрск', '48.0333333', '38.4833333'),
(91, 30, 'Ясиноватая', '48.1221425', '37.8765944'),
(92, 31, 'Андрушёвка', '50.0166667', '29.0166667'),
(93, 31, 'Барановка', '50.30204', '27.67634'),
(94, 31, 'Бердичев', '49.903381', '28.599251'),
(95, 31, 'Житомир', '50.259749', '28.676248'),
(96, 31, 'Коростень', '50.95', '28.6333333'),
(97, 31, 'Коростышев', '50.316639', '29.06653'),
(98, 31, 'Малин', '50.77121', '29.25297'),
(99, 31, 'Новоград-Волынский', '50.59256', '27.62348'),
(100, 31, 'Овруч', '51.327251', '28.818979'),
(101, 31, 'Радомышль', '50.4947222', '29.2333333'),
(102, 32, 'Берегово', '48.2', '22.6333333'),
(103, 32, 'Виноградов', '48.138142', '23.041519'),
(104, 32, 'Иршава', '48.310911', '23.037711'),
(105, 32, 'Мукачево', '48.442411', '22.723352'),
(106, 32, 'Перечин', '48.7341667', '22.4741667'),
(107, 32, 'Рахов', '48.060829', '24.205059'),
(108, 32, 'Свалява', '48.5472222', '22.9861111'),
(109, 32, 'Тячев', '48.0113889', '23.5722222'),
(110, 32, 'Ужгород', '48.6166667', '22.3'),
(111, 32, 'Хуст', '48.1813889', '23.2977778'),
(112, 32, 'Чоп', '48.4333333', '22.2'),
(113, 33, 'Бердянск', '46.748581', '36.809502'),
(114, 33, 'Васильевка', '47.433708', '35.27816'),
(115, 33, 'Вольнянск', '47.9419444', '35.4280556'),
(116, 33, 'Гуляйполе', '47.658562', '36.252918'),
(117, 33, 'Днепрорудное', '47.3840983', '34.98121'),
(118, 33, 'Запорожье', '47.853748', '35.157139'),
(119, 33, 'Каменка-Днепровская', '47.488911', '34.400761'),
(120, 33, 'Мелитополь', '46.847839', '35.364979'),
(121, 33, 'Молочанск', '47.206982', '35.59618'),
(122, 33, 'Орехов', '47.5666667', '35.7833333'),
(123, 33, 'Пологи', '47.47728', '36.25626'),
(124, 33, 'Приморск', '46.7333333', '36.35'),
(125, 33, 'Токмак', '47.25', '35.7'),
(126, 33, 'Энергодар', '47.4979877', '34.6565334'),
(127, 34, 'Болехов', '49.070011', '23.864719'),
(128, 34, 'Бурштын', '49.263802', '24.634211'),
(129, 34, 'Галич', '49.1247222', '24.7286111'),
(130, 34, 'Городенка', '48.6675', '25.5002778'),
(131, 34, 'Долина', '51.79', '33.76'),
(132, 34, 'Ивано-Франковск', '48.9166667', '24.7166667'),
(133, 34, 'Калуш', '49.050465', '24.374117'),
(134, 34, 'Коломыя', '48.53146', '25.039709'),
(135, 34, 'Косов', '48.315', '25.0952778'),
(136, 34, 'Надворная', '48.6333333', '24.5833333'),
(137, 34, 'Рогатин', '49.411449', '24.62051'),
(138, 34, 'Снятын', '48.45', '25.5666667'),
(139, 34, 'Тысменица', '48.9008333', '24.8491667'),
(140, 34, 'Тлумач', '48.8666667', '25.0'),
(141, 34, 'Яремче', '48.449523', '24.557508'),
(142, 35, 'Белая Церковь', '49.7988889', '30.1152778'),
(143, 35, 'Березань', '50.3197222', '31.47'),
(144, 35, 'Богуслав', '49.541031', '30.88073'),
(145, 35, 'Борисполь', '50.350491', '30.960739'),
(146, 35, 'Боярка', '49.323518', '30.700165'),
(147, 35, 'Бровары', '50.5166667', '30.8166667'),
(148, 35, 'Буча', '50.5569165', '30.2230733'),
(149, 35, 'Васильков', '50.178959', '30.32715'),
(150, 35, 'Вишнёвое', '50.4377778', '33.3822222'),
(151, 35, 'Вышгород', '50.5833333', '30.5'),
(152, 35, 'Ирпень', '50.5166667', '30.25'),
(153, 35, 'Кагарлык', '49.85722', '30.82032'),
(154, 35, 'Киев', '50.584981', '30.235748'),
(155, 35, 'Мироновка', '49.661022', '30.98458'),
(156, 35, 'Обухов', '50.105728', '30.630699'),
(157, 35, 'Переяслав-Хмельницкий', '50.070141', '31.45775'),
(158, 35, 'Припять', '51.4977778', '24.1180556'),
(159, 35, 'Ржищев', '49.972801', '31.04777'),
(160, 35, 'Сквира', '49.73719', '29.66901'),
(161, 35, 'Славутич', '51.523777', '30.768559'),
(162, 35, 'Тараща', '49.56065', '30.510309'),
(163, 35, 'Тетиев', '49.370575', '29.680221'),
(164, 35, 'Узин', '49.820228', '30.438929'),
(165, 35, 'Украинка', '50.1530861', '30.7434917'),
(166, 35, 'Фастов', '50.0833333', '29.9166667'),
(167, 35, 'Чернобыль', '51.2666667', '30.2166667'),
(168, 35, 'Яготин', '50.244949', '31.796261'),
(169, 36, 'Александрия', '48.6666667', '33.1166667'),
(170, 36, 'Бобринец', '48.050861', '32.16589'),
(171, 36, 'Гайворон', '48.3333333', '29.8666667'),
(172, 36, 'Долинская', '48.1108333', '32.7647222'),
(173, 36, 'Знаменка', '48.7166667', '32.6666667'),
(174, 36, 'Кировоград', '48.508389', '32.264801'),
(175, 36, 'Малая Виска', '48.65', '31.6333333'),
(176, 36, 'Новомиргород', '48.7833333', '31.65'),
(177, 36, 'Новоукраинка', '48.3155556', '31.5269444'),
(178, 36, 'Светловодск', '49.0502778', '33.2419444'),
(179, 37, 'Александровск', '48.5861652', '39.1949396'),
(180, 37, 'Алмазная', '48.5166667', '38.5833333'),
(181, 37, 'Алчевск', '48.4666667', '38.8'),
(182, 37, 'Антрацит', '48.1166667', '39.0833333'),
(183, 37, 'Брянка', '48.5133333', '38.6430556'),
(184, 37, 'Вахрушево', '48.174579', '38.837224'),
(185, 37, 'Горное', '49.1805556', '23.7341667'),
(186, 37, 'Зимогорье', '48.5833333', '38.9333333'),
(187, 37, 'Золотое', '48.6928568', '38.5146349'),
(188, 37, 'Зоринск', '48.4131636', '38.6204799'),
(189, 37, 'Краснодон', '48.29607', '39.745239'),
(190, 37, 'Красный Луч', '48.134041', '38.931419'),
(191, 37, 'Лисичанск', '48.896895', '38.444143'),
(192, 37, 'Луганск', '48.573269', '39.355659'),
(193, 37, 'Лутугино', '48.4019444', '39.2102778'),
(194, 37, 'Миусинск', '48.07', '38.9'),
(195, 37, 'Молодогвардейск', '48.3444444', '39.6583333'),
(196, 37, 'Новодружеск', '48.9666667', '38.35'),
(197, 37, 'Новопсков', '49.544731', '39.103889'),
(198, 37, 'Первомайск', '48.05', '30.85'),
(199, 37, 'Перевальск', '48.4388889', '38.8194444'),
(200, 37, 'Петровское', '48.293331', '38.888614'),
(201, 37, 'Попасная', '48.6333333', '38.38'),
(202, 37, 'Приволье', '49.016706', '38.302668'),
(203, 37, 'Ровеньки', '48.0833333', '39.3666667'),
(204, 37, 'Рубежное', '49.0166667', '38.3666667'),
(205, 37, 'Сватово', '49.41011', '38.15258'),
(206, 37, 'Свердловск', '48.084549', '39.65163'),
(207, 37, 'Северодонецк', '48.950191', '38.497631'),
(208, 37, 'Старобельск', '49.2666667', '38.9166667'),
(209, 37, 'Стаханов', '48.5666667', '38.65'),
(210, 37, 'Суходольск', '48.3523068', '39.7239205'),
(211, 37, 'Счастье', '48.737247', '39.2311974'),
(212, 37, 'Теплогорск', '48.600487', '38.5920825'),
(213, 37, 'Червонопартизанск', '48.095566', '39.759607'),
(214, 38, 'Белз', '50.380501', '24.01269'),
(215, 38, 'Бобрка', '49.6331904', '24.2907476'),
(216, 38, 'Борислав', '49.28476', '23.42137'),
(217, 38, 'Броды', '50.0833333', '25.15'),
(218, 38, 'Буск', '49.9666667', '24.6333333'),
(219, 38, 'Великие Мосты', '50.24', '24.1394444'),
(220, 38, 'Глиняны', '49.8233333', '24.5166667'),
(221, 38, 'Городок', '49.1666667', '26.5666667'),
(222, 38, 'Добромиль', '49.5666667', '22.7833333'),
(223, 38, 'Дрогобыч', '49.34853', '23.51647'),
(224, 38, 'Дубляны', '49.8833333', '24.0833333'),
(225, 38, 'Жидачов', '49.3813889', '24.1408333'),
(226, 38, 'Жолква', '50.0666667', '23.9666667'),
(227, 38, 'Золочев', '49.8083333', '24.9011111'),
(228, 38, 'Каменка-Бугская', '50.1', '24.35'),
(229, 38, 'Львов', '49.85', '24.0166667'),
(230, 38, 'Мостиска', '49.7941667', '23.1525'),
(231, 38, 'Перемышляны', '49.67', '24.5594444'),
(232, 38, 'Пустомыты', '49.7138889', '23.9108333'),
(233, 38, 'Рава-Русская', '50.230431', '23.628309'),
(234, 38, 'Радехов', '50.2827778', '24.6375'),
(235, 38, 'Рудки', '49.6530556', '23.4880556'),
(236, 38, 'Самбор', '49.5166667', '23.2027778'),
(237, 38, 'Сколе', '49.036049', '23.51232'),
(238, 38, 'Сокаль', '50.4833333', '24.2833333'),
(239, 38, 'Старый Самбор', '49.4430556', '23.0033333'),
(240, 38, 'Стрый', '49.256171', '23.850306'),
(241, 38, 'Трускавец', '49.2805556', '23.505'),
(242, 38, 'Угнев', '50.3666667', '23.7444444'),
(243, 38, 'Хыров', '49.5333333', '22.85'),
(244, 38, 'Червоноград', '50.3833333', '24.2333333'),
(245, 38, 'Яворов', '49.942501', '23.390989'),
(246, 39, 'Баштанка', '47.404331', '32.445301'),
(247, 39, 'Вознесенск', '47.587711', '31.336'),
(248, 39, 'Николаев', '46.9666667', '32.0'),
(249, 39, 'Новая Одесса', '47.3166667', '31.7833333'),
(250, 39, 'Новый Буг', '47.6833333', '32.5'),
(251, 39, 'Очаков', '46.6166667', '31.55'),
(252, 39, 'Первомайск', '48.05', '30.85'),
(253, 39, 'Снигирёвка', '47.0666667', '32.8166667'),
(254, 39, 'Южноукраинск', '47.8166667', '31.1833333'),
(255, 40, 'Ананьев', '47.7173', '29.975639'),
(256, 40, 'Арциз', '45.99739', '29.431288'),
(257, 40, 'Балта', '47.9333333', '29.6166667'),
(258, 40, 'Белгород-Днестровский', '46.1833333', '30.3333333'),
(259, 40, 'Болград', '45.682701', '28.61935'),
(260, 40, 'Измаил', '45.3516667', '28.8363889'),
(261, 40, 'Ильичёвск', '46.3020534', '30.6517391'),
(262, 40, 'Килия', '45.45578', '29.273291'),
(263, 40, 'Кодыма', '48.093941', '29.13368'),
(264, 40, 'Котовск', '47.75', '29.5333333'),
(265, 40, 'Одесса', '46.4666667', '30.7333333'),
(266, 40, 'Татарбунары', '45.841418', '29.62284'),
(267, 40, 'Теплодар', '46.5', '30.3333333'),
(268, 40, 'Южное', '47.8173262', '33.5737487'),
(269, 41, 'Гадяч', '50.3666667', '34.0'),
(270, 41, 'Глобино', '49.3833333', '33.2833333'),
(271, 41, 'Гребёнка', '50.116852', '32.44059'),
(272, 41, 'Зеньков', '50.20955', '34.362345'),
(273, 41, 'Карловка', '49.45', '35.1333333'),
(274, 41, 'Кременчуг', '49.073521', '33.4231'),
(275, 41, 'Кобеляки', '49.145439', '34.213638'),
(276, 41, 'Комсомольск', '49.013756', '33.643381'),
(277, 41, 'Лохвица', '50.36319', '33.253288'),
(278, 41, 'Лубны', '50.0166667', '33.0'),
(279, 41, 'Миргород', '49.963799', '33.61869'),
(280, 41, 'Пирятин', '50.23975', '32.514309'),
(281, 41, 'Полтава', '49.59269', '34.551159'),
(282, 41, 'Хорол', '49.790279', '33.207809'),
(283, 41, 'Червонозаводское', '50.4', '33.4'),
(284, 42, 'Березне', '51.0', '26.75'),
(285, 42, 'Дубно', '50.38738', '25.754559'),
(286, 42, 'Дубровица', '51.571209', '26.56805'),
(287, 42, 'Здолбунов', '50.5166667', '26.25'),
(288, 42, 'Корец', '50.619129', '27.161869'),
(289, 42, 'Костополь', '50.8833333', '26.45'),
(290, 42, 'Кузнецовск', '51.3436553', '25.8490867'),
(291, 42, 'Острог', '50.3333333', '26.5166667'),
(292, 42, 'Радивилов', '50.125777', '25.264195'),
(293, 42, 'Ровно', '50.6166667', '26.25'),
(294, 42, 'Сарны', '51.3372222', '26.6058333'),
(295, 43, 'Ахтырка', '50.29855', '34.892052'),
(296, 43, 'Белополье', '51.149402', '34.3175225'),
(297, 43, 'Бурынь', '51.1978', '33.847351'),
(298, 43, 'Глухов', '51.6786111', '33.9113889'),
(299, 43, 'Кролевец', '51.550121', '33.38279'),
(300, 43, 'Конотоп', '51.237469', '33.21217'),
(301, 43, 'Лебедин', '48.96', '31.52'),
(302, 43, 'Путивль', '51.337589', '33.87888'),
(303, 43, 'Ромны', '50.743919', '33.475712'),
(304, 43, 'Середина-Буда', '52.1833333', '34.0333333'),
(305, 43, 'Сумы', '50.910561', '34.80566'),
(306, 43, 'Тростянец', '50.9599282', '25.55378'),
(307, 43, 'Шостка', '51.86282', '33.487831'),
(308, 44, 'Бережаны', '49.444191', '24.94486'),
(309, 44, 'Борщёв', '48.803181', '26.041809'),
(310, 44, 'Бучач', '49.05772', '25.401979'),
(311, 44, 'Залещики', '48.65', '25.7333333'),
(312, 44, 'Збараж', '49.6666667', '25.7777778'),
(313, 44, 'Зборов', '49.660696', '25.1434667'),
(314, 44, 'Кременец', '50.099129', '25.7328'),
(315, 44, 'Лановцы', '49.8659402', '26.0841931'),
(316, 44, 'Монастыриска', '49.0888889', '25.1694444'),
(317, 44, 'Подволочиск', '49.5246859', '26.137326'),
(318, 44, 'Подгайцы', '49.2694444', '25.1361111'),
(319, 44, 'Почаев', '50.0', '25.5083333'),
(320, 44, 'Скалат', '49.424214', '25.976246'),
(321, 44, 'Тернополь', '49.551361', '25.603979'),
(322, 44, 'Теребовля', '49.29348', '25.699551'),
(323, 44, 'Чортков', '49.0166667', '25.8'),
(324, 44, 'Шумск', '50.122577', '26.1149716'),
(325, 45, 'Балаклея', '49.4658333', '36.8677778'),
(326, 45, 'Барвенково', '48.9', '37.0166667'),
(327, 45, 'Богодухов', '50.1654302', '35.5267251'),
(328, 45, 'Валки', '49.843601', '35.61388'),
(329, 45, 'Великий Бурлук', '50.0455556', '37.3905556'),
(330, 45, 'Волчанск', '50.278519', '36.945171'),
(331, 45, 'Дергачи', '50.110668', '36.114361'),
(332, 45, 'Змиев', '49.701939', '36.355171'),
(333, 45, 'Изюм', '49.2127778', '37.2569444'),
(334, 45, 'Красноград', '49.3666667', '35.45'),
(335, 45, 'Купянск', '49.721901', '37.624329'),
(336, 45, 'Лозовая', '48.891684', '36.325786'),
(337, 45, 'Люботин', '49.95', '35.9166667'),
(338, 45, 'Мерефа', '49.8166667', '36.05'),
(339, 45, 'Первомайский', '49.3833333', '36.2166667'),
(340, 45, 'Харьков', '49.98967', '36.208309'),
(341, 45, 'Чугуев', '49.8355556', '36.6863889'),
(342, 46, 'Берислав', '46.843822', '33.4375'),
(343, 46, 'Геническ', '46.171638', '34.80777'),
(344, 46, 'Голая Пристань', '46.5166667', '32.5166667'),
(345, 46, 'Каховка', '46.817388', '33.494325'),
(346, 46, 'Новая Каховка', '46.7666667', '33.3666667'),
(347, 46, 'Скадовск', '46.116871', '32.913731'),
(348, 46, 'Таврийск', '46.7528018', '33.4216856'),
(349, 46, 'Херсон', '46.653368', '32.629424'),
(350, 46, 'Цюрупинск', '46.62', '32.72'),
(351, 47, 'Волочиск', '49.535179', '26.22331'),
(352, 47, 'Городок', '49.1666667', '26.5666667'),
(353, 47, 'Деражня', '49.267071', '27.440269'),
(354, 47, 'Дунаевцы', '48.8909743', '26.8546608'),
(355, 47, 'Изяслав', '50.119221', '26.82629'),
(356, 47, 'Каменец-Подольский', '48.6833333', '26.5833333'),
(357, 47, 'Красилов', '49.6519444', '26.9705556'),
(358, 47, 'Нетешин', '50.3374232', '26.6404529'),
(359, 47, 'Полонное', '50.122269', '27.511909'),
(360, 47, 'Славута', '49.0563905', '27.3944506'),
(361, 47, 'Староконстантинов', '49.7555556', '27.2208333'),
(362, 47, 'Хмельницкий', '49.4166667', '27.0'),
(363, 47, 'Шепетовка', '50.179131', '27.07732'),
(364, 48, 'Ватутино', '49.0166667', '31.0666667'),
(365, 48, 'Городище', '49.290649', '31.443199'),
(366, 48, 'Жашков', '49.245522', '30.11998'),
(367, 48, 'Звенигородка', '49.075489', '30.967911'),
(368, 48, 'Золотоноша', '49.674271', '32.040421'),
(369, 48, 'Каменка', '49.036347', '32.103481'),
(370, 48, 'Канев', '49.75', '31.4666667'),
(371, 48, 'Корсунь-Шевченковский', '49.421051', '31.268993'),
(372, 48, 'Монастырище', '48.9909154', '29.8051363'),
(373, 48, 'Смела', '49.224621', '31.878401'),
(374, 48, 'Тальное', '48.8833333', '30.7'),
(375, 48, 'Умань', '48.75', '30.2166667'),
(376, 48, 'Христиновка', '48.8494444', '29.97'),
(377, 48, 'Черкассы', '49.4333333', '32.0666667'),
(378, 48, 'Чигирин', '49.072498', '32.683578'),
(379, 48, 'Шпола', '49.00349', '31.385559'),
(380, 49, 'Бахмач', '51.1830556', '32.8297222'),
(381, 49, 'Бобровица', '50.745', '31.3869444'),
(382, 49, 'Борзна', '51.249451', '32.43034'),
(383, 49, 'Городня', '51.8905556', '31.5936111'),
(384, 49, 'Десна', '50.9246667', '30.756'),
(385, 49, 'Ичня', '50.863918', '32.39307'),
(386, 49, 'Корюковка', '51.7754831', '32.2595792'),
(387, 49, 'Мена', '51.521759', '32.21888'),
(388, 49, 'Нежин', '51.0380556', '31.8861111'),
(389, 49, 'Новгород-Северский', '52.0069896', '33.2537069'),
(390, 49, 'Носовка', '50.9333333', '31.5833333'),
(391, 49, 'Прилуки', '50.594181', '32.38689'),
(392, 49, 'Седнев', '51.6463023', '31.5616846'),
(393, 49, 'Семёновка', '52.173561', '32.587059'),
(394, 49, 'Чернигов', '51.503653', '31.293167'),
(395, 49, 'Щорс', '51.819321', '31.94846'),
(396, 50, 'Вашковцы', '48.38', '25.51'),
(397, 50, 'Вижница', '48.25', '25.1916667'),
(398, 50, 'Герца', '48.1485764', '26.2572996'),
(399, 50, 'Заставна', '48.5166667', '25.85'),
(400, 50, 'Кицмань', '48.4425', '25.7613889'),
(401, 50, 'Новоднестровск', '48.5833333', '27.4333333'),
(402, 50, 'Новоселица', '48.2166667', '26.2666667'),
(403, 50, 'Сокиряны', '48.45', '27.4166667'),
(404, 50, 'Сторожинец', '48.1666667', '25.7166667'),
(405, 50, 'Хотин', '48.5', '26.5'),
(406, 50, 'Черновцы', '48.3', '25.9333333');

-- --------------------------------------------------------

--
-- Структура таблиці `regions_obl`
--

DROP TABLE IF EXISTS `regions_obl`;
CREATE TABLE IF NOT EXISTS `regions_obl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=51 ;

--
-- Дамп даних таблиці `regions_obl`
--

INSERT INTO `regions_obl` (`id`, `title`) VALUES
(44, 'Тернопольская область'),
(43, 'Сумская область'),
(42, 'Ровенская область'),
(41, 'Полтавская область'),
(40, 'Одесская область'),
(39, 'Николаевская область'),
(38, 'Львовская область'),
(37, 'Луганская область'),
(36, 'Кировоградская область'),
(35, 'Киевская область'),
(34, 'Ивано-Франковская область'),
(33, 'Запорожская область'),
(32, 'Закарпатская область'),
(31, 'Житомирская область'),
(30, 'Донецкая область'),
(29, 'Днепропетровская область'),
(28, 'Волынская область'),
(27, 'Винницкая область'),
(26, 'Автономная Республика Крым'),
(45, 'Харьковская область'),
(46, 'Херсонская область'),
(47, 'Хмельницкая область'),
(48, 'Черкасская область'),
(49, 'Черниговская область'),
(50, 'Черновицкая область');

-- --------------------------------------------------------

--
-- Структура таблиці `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `subscription`
--

INSERT INTO `subscription` (`id`, `name`, `mail`, `phone`) VALUES
(1, 'Шмалий Максим', 'shmaliy.maxim@gmail.com', '0939334956');

-- --------------------------------------------------------

--
-- Структура таблиці `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'клубы'),
(2, 'лесбиянки'),
(3, 'геи'),
(4, 'голые'),
(5, 'алкоголички'),
(6, 'алкоголики'),
(7, 'проститутки'),
(8, 'измена'),
(9, 'минет');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
