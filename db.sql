-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Gru 2018, 22:04
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pai_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `login`, `pass`) VALUES
(1, 'admin', '16d7a4fca7442dda3ad93c9a726597e4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Komputery'),
(2, 'Płyty główne'),
(3, 'Procesory'),
(4, 'Pamięć'),
(5, 'Dyski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `img`, `category`, `subcategory`) VALUES
(5, 'Komputer', 'erfyhujikujyhtgrfd', 'komputer.jpg', 1, 1),
(6, 'Komputer2', 'rtgsruerjnte hrtfgsuseh9t8pzhtg rusth8ioy ruth8tgjjiogrtoprhrd rfhrfhudguo eufdthzugidgdf', 'https://i.ytimg.com/vi/-2tmMG_L4GQ/maxresdefault.jpg', 1, 1),
(7, 'Laptop', 'rftgyhmkrtwiue8tgut8rjhfyy', 'https://ecsmedia.pl/c/fisher-price-zabawka-edukacyjna-laptop-malucha-cdg84-b-iext43882200.jpg', 1, 2),
(8, 'Dysk1', 'erftguyjuhwerjhtuoetjhiotghufg', 'http://techfresh.pl/wp-content/uploads/2016/04/dysk-twardy-do-laptopa-1TB-ranking.jpg', 5, 3),
(9, 'Dysk2', 'erftgyhtujytjrugh7euerty8rtorfguigrhoutfghtgjhf', 'https://www.sklep-bcs.pl/galerie/656_hdd2tb.jpg', 5, 3),
(10, 'Dysk1', 'retyujiyt8rfuyjho;irtguj8eruj8rtgrtgtgrtg', 'https://static.antyweb.pl/wp-content/uploads/2018/02/20165600/ssd-samsung-1420x670.jpg', 5, 4),
(11, 'Płyta główna1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non lorem vitae tortor convallis mattis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi viverra pellentesque ipsum non aliquet. Maecenas elit mauris, vulputate at ultrices id, venenatis at nunc. Donec mollis vel turpis vitae ornare. Donec feugiat congue sem, in aliquet metus accumsan non. Aenean gravida placerat nibh, at condimentum elit sollicitudin quis. Fusce in rhoncus dui. Integer faucibus dui sit amet dui porttitor, sed viverra sem lobortis. Donec scelerisque magna enim, id hendrerit augue venenatis a. Pellentesque ut pulvinar elit, et molestie quam.  Morbi placerat sollicitudin sapien vel consectetur. Ut id ipsum a tortor bibendum molestie. Proin finibus ultrices augue non luctus. Phasellus non neque scelerisque, faucibus orci vitae, euismod odio. Sed elementum lobortis lectus nec bibendum. Aliquam facilisis risus at lectus blandit, vitae eleifend purus porta. Nunc felis lectus, semper id enim eget, consequat euismod justo. Proin consequat massa erat, eu accumsan orci tristique id. In molestie eleifend ornare. Cras augue orci, viverra lobortis vulputate in, ornare at massa. Nullam sit amet vestibulum libero. Vestibulum odio felis, condimentum vel porta et, sodales vel arcu. Sed laoreet, dui ut tincidunt tincidunt, neque quam blandit massa, quis imperdiet eros ante quis felis.\r\n\r\n\r\nCENA: 999999999999999999 zł', 'http://hawk.pl/images/0009/7616.jpg', 2, NULL),
(12, 'Płyta główna2', 'edrtfuijytrferfhyteryhutjrtyuhj', 'https://s12emagst.akamaized.net/products/3079/3078847/images/res_b89c051b2fb9f72ce9cd0ade99f7aceb_full.jpg', 2, NULL),
(13, 'Intel Pentium II', 'Pentium II – mikroprocesor bazujący na architekturze serii x86, zaprojektowany i wytwarzany przez firmę Intel, oficjalnie zaprezentowany 7 maja 1997. Bazuje na rdzeniu P6, który po raz pierwszy został użyty w Pentium Pro, ma dodatkowe instrukcje MMX i poprawioną obsługę programów 16-bitowych.\r\n\r\nPierwsze wersje Pentium II \"Klamath\" taktowane zegarem 233 i 266 MHz były produkowane w technologii 350 nm i były bardzo gorące (w porównaniu z innymi procesorami z tamtego okresu). Używały magistrali FSB taktowanej częstotliwością 66 MHz, co było niewystarczające do uzyskania pełnego potencjału tych procesorów. Nieco później pojawiła się odmiana z zegarem 300 MHz.\r\n\r\nNastępna wersja, \"Deschutes\" zadebiutowała w styczniu 1998 i dzięki temu, że zmieniono technologię produkcji na 250 nm, wydzielały one zdecydowanie mniej ciepła. Pierwsza wersja procesora o szybkości 333 MHz wciąż używała magistrali FSB 66 MHz, jednak przyspieszono ją później do 100 MHz, co znacznie poprawiło wydajność. W 1998 ukazały się wersje o szybkości 350, 400 i 450 MHz. W tym samym czasie co Pentium II na rynku komputerowym pojawiły się także takie nowości jak SDRAM i magistrala graficzna AGP, co jeszcze bardziej poprawiło osiągi procesora.\r\n\r\nW odróżnieniu od poprzednich wersji Pentium, Pentium II nie miał obudowy typu \"socket\" (gniazdo) ale \"slot\" (łącze krawędziowe). Takie rozwiązanie było wymagane z dwóch powodów: po pierwsze ułatwiało pozbycie się dużych ilości ciepła generowanych przez Pentium II, a po drugie umożliwiło odseparowanie cache L2 od procesora ale nadal pozwalało na bliskie położenie tych dwóch komponentów. Zewnętrzny cache Pentium II był wolniejszy od rozwiązania użytego w Pentium Pro (pamięć cache pracowała z połową częstotliwości procesora) ale to rozwiązanie pozwoliło zwiększyć wydajność produkcji i obniżyć ceny.\r\n\r\nTańsza wersja Pentium II (całkowicie bez cache lub z mniejszym cache) była sprzedawana pod nazwą \"Celeron\". Wersja serwerowa była sprzedawana pod nazwą Pentium II Xeon.\r\n\r\nPentium II zostało zastąpione przez Pentium III na początku 1999 roku.', 'https://upload.wikimedia.org/wikipedia/commons/4/41/Intel_Pentium_II_350_MHz.jpg', 3, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category`) VALUES
(1, 'PC', 1),
(2, 'Laptopy', 1),
(3, 'HDD', 5),
(4, 'SSD', 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
