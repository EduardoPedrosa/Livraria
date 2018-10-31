-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2018 at 03:50 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Livraria`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Carrinho`
--

CREATE TABLE `Carrinho` (
  `quantidade` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Carrinho`
--

INSERT INTO `Carrinho` (`quantidade`, `idCliente`, `idProduto`) VALUES
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` char(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`idCliente`, `nome`, `cpf`, `email`, `senha`, `rua`, `numero`, `bairro`, `cidade`, `telefone`) VALUES
(1, 'Eduardo', '12312312322', 'asdfasdfasdf', 'asdfasdfasdf', 'asdf', 123, 'asdf', 'asdf', '12312312312');

-- --------------------------------------------------------

--
-- Table structure for table `Produto`
--

CREATE TABLE `Produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `condicao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `capa` blob NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Produto`
--

INSERT INTO `Produto` (`idProduto`, `nome`, `autor`, `preco`, `condicao`, `descricao`, `capa`, `quantidade`) VALUES
(3, 'Grafos', 'Golbarg', '50', 'Novo', 'Livro de algoritmos e teoria em Grafos', 0xffd8ffe000104a46494600010100000100010000ffdb0043000b08080808080b08080b100b090b10130e0b0b0e1316121213121216151113121213111515191a1b1a1915212124242121302f2f2f3036363636363636363636ffdb0043010c0b0b0c0d0c0f0d0d0f130e0e0e13140e0f0f0e141a12121412121a22181515151518221e201b1b1b201e2525222225252f2f2c2f2f36363636363636363636ffc0001108015a010403012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f53b6b6b76b7899a242c5149254649c0e4f1527d96dbfe78c7ff007c8ff0a2d7fe3da1ff00ae6bfc8543a85f8b08e26f225b992693ca8a18029766dace7fd63a2801509e4d004df65b6ff9e31ffdf23fc28fb2db7fcf18ff00ef91fe15406b1747fe60f7dff92dff00c934bfdaf75ff408bdff00c97ffe49a00bdf65b6ff009e31ff00df23fc28fb2db7fcf18ffef91fe1547fb5eebfe80f7dff0092dffc934fb2d5c5dddbd8cb6971693ac626559c47864ddb095314920e0f50714016fecb6dff003c63ff00be47f851f65b6ff9e31ffdf23fc2a5a28022fb2db7fcf18ffef91fe147d96dbfe78c7ff7c8ff000a968a008becb6dff3c63ffbe47f851f65b6ff009e31ff00df23fc2a5a28022fb2db7fcf18ff00ef91fe147d96dbfe78c7ff007c8ff0a968a008becb6dff003c63ff00be47f851f65b6ff9e31ffdf23fc2a5a28022fb2db7fcf18ffef91fe147d96dbfe78c7ff7c8ff000a968a008becb6dff3c63ffbe47f851f65b6ff009e31ff00df23fc2a5a28022fb2db7fcf18ff00ef91fe147d96dbfe78c7ff007c8ff0a968a008becb6dff003c63ff00be47f851f65b6ff9e31ffdf23fc2a5a28022fb2db7fcf18ffef91fe147d96dbfe78c7ff7c8ff000a968a008becb6dff3c63ffbe47f851f65b6ff009e31ff00df23fc2a5a28022fb2db7fcf18ff00ef91fe147d96dbfe78c7ff007c8ff0a968a008becb6dff003c63ff00be47f851f65b6ff9e31ffdf23fc2a5a28030f55448ae1562508bb01c28c0ce5b9e28a76b1ff1f29ff5cc7f36a290cd5b5ff8f687feb9aff2155eff00fe3e74dffaf96ffd27b8ab16bff1ed0ffd735fe42abdff00fc7ce9bff5f2dffa4f714c4788f88bc67e2c1ae6a5a6a6b0d1db0ba658ded99362206222db340bb80018061d78e79ac65f18f8ab28dfdb77859f2c4f9cc55464e32a338e46718e95b7e23d19f54d7bc4fa95a5abdbff0066bb3bc76ea0c588c6e79a6955bef4814b6c519c9c92304d60cda6c860d3ece1b3b8b4be9433179331c7748d8114b00930c4b29208507b60649a0093fe139f1842768d62e4640dc59c4992a4b654b67be41c7d39af73d1ee1af2ef4dbc793ce7b8d26395a6c05de5da362db40006739c015e53e09f0e683e24d72fb4ad4a39904106f8215611b214915265914ef20f9872a15b819cf515eb76167169baada69b6e4982d34c58622e72c5637440588c64e073c5006dd14514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514018bac7fc7ca7fd731fcda8a358ff8f94ffae63f9b514866adaffc7b43ff005cd7f90aada867ed3a6e3fe7e8ff00e93dc559b5ff008f687feb9aff002155354962827d36499d513ed4416620019b7b8c649e2988e3bc59e2c3a15b5ce95e0fb093fb4da626e268ed1cc51b3e4c92e766d924cedec47d718ae57c67af5df8956c51349bd98589562cf6ef13bc808f3191a34251640318cf500f18e7bb4b0d460bfb8bb8f5949a391ee5a2825bc90222cdbbca5555040d9bbbeee836ede9505a691aa47115b8f117ef8481a3916eddc043b237575930199a3dc73c287c32a2e280386d1f5cbad13c5375e255d02f5e3be8a5125b08dc18a590a49f2b98c6e5ca60e40c64919e87d4b4cbc7d4751b3d42581ed64b8d3448f6b2821e366914956c853c138ce056249a2eaac93c30f88f6091d7c994de4cc62513c9293b59f73b189963c17db81c83c63674c60baadadb34eb733c1a62a4f2abf99b995d14b331e496209c9e4d0074145145001451450014514500145145001451450014515c878c7e2169be147166919bdd519437d99582ac60fdd32be0ed2dd400093ec30686075f4579745e28f8b3788b776fa0c290f2562789d091db72cb3abfe200aedbc27a9eb1ab6902eb5db2fb06a0b23c7241b1e3185230cab212707d7247bd24c5736e8a28a630a28a64b22c51bcac0911a962075c01938a007d15e39a27fc263f11eeefb508f5c9b49b4b760b1456eceaa0b64aa0489e3ced0396639e7f2f56d1ed6eec74bb4b3bfb837577044a935c92499180c1725b2493ef493b893b9768a28a630a28a2800a28a28031758ff8f94ffae63f9b5146b1ff001f29ff005cc7f36a290cd5b5ff008f687feb9aff0021523c6922ed9143aff758647e46a3b5ff008f687feb9aff002152d31117d96d7fe78c7ff7c8ff000a3ecb6bff003c63ff00be47f854b450045f65b5ff009e31ff00df23fc29d1c31459f291533d768033f5c53e8a0028a28a0028a28a0028a28a0028a28a0028a28a0047608acedd14127e839af1ff00865689e25f13ea5e25d4c79d3db959a30fc8596e0bec600ffcf348c85f4e31d057b09008c1e878af14f0e6a0df0dbc5f7da56b0ac9a75c7c9e7005bf7618b5bdc2800965c12ad8e41cf718a996ebb132dd763d2753f1ef85746d425d2f52be30de43b7cc8bc999f1bd5645f9923653956078357f44f11691e23865b8d1e7fb4450bf97231478f0d80d8c4aaa4f06b9bd7c7c3fd52c2ff57f374db8bf96ddcc770658cc86458b6c407cd9dc300018cd677c17cff62ea3bbef7dac67fefd2517d6c3beb639dd035bf885e234bcd1349bd2f2799bee3529982b411fcca23560a48de471b413c71819aee1f44f1b5b784ecf48b0d551b5b139fb66a333b49fb8632b1dad2a3b923280719e3822b99f83647f686bc01ff9e3ff00a1cd573e316aba85adb69da5dbc8d05a5e990dd48848de13601192bcedc392477e292d23764ad237666eafa678ebc2f672ebb6de287d445a328bb80bb4813790a098e52ea7961918040e6ba59af75ff1a7832c754d0ae934bbc7676bd049da5631245222fcae70cc030cf6ef5c7788bc25e0ad03c3e350d3f546b9d51d53ec8a268d9662c543b089172176927af1c73ebda7c3a27fe15fc24f5c5d7fe8c968ead74b02dedd2c707e08d2fc51ab5a5e37853534d2e18e451711be7e772b90c0847c60715d378bbc57e216d66d7c11e19900d4ca4697b798f98c8c81c842c085554f9d98027d318396fc1520e9faae3fe7bc7ffa01accbfb88bc31f16cea3aa0f2ecae4ef4b861c049a1f2bcc07d1640558f619a495a2bf505a45126af6bf10fc090c7ad1d69b54b40eab7514ccf22a927805652485278dc841ae9f5cf1d983c0b0f89f4c8c0b9bdd90c2ac37ac53316593774cec28c0678271eb507c4cf12e8f1f85e7b08aea2b8b9bfd8b0c713ab9081964329da4e170bc1f5a6f85f4dd2adbe1e5a69fe2b78a0b3d4599b6dc3888665669a201c95c36d5dc39aaebb8fad918ba4787fc7fade9b07882cbc56de75caf98b6e6473129fee304cc6a4742bb383c57a869a97b1e9d689a93892fd608c5dc8b8dad3040246180a305b24703e95e35e29f0d69be0e89757f0d7881d6e4b855b513299994f565684ae5571cee5c7bfafac785efeef54f0ee9ba8df8c5ddc5ba3ca71b77123efe380370f9b8e39e288f608b35a8a28aa28c5d63fe3e53feb98fe6d451ac7fc7ca7fd731fcda8a43356d7fe3da1ff00ae6bfc854b515aff00c7b43ff5cd7f90a9698828a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a000d676b1a068fafc02df57b44b944cf96cc30e99c64a3ae1973819c1e7bd68d55bdbc5b4541b1a59a66d904298dced824f248000009249a993514dcb6426d25a9c77fc2a1f0879be601740673e5f9df2fd33b777eb5d4687e1ed27c396cf6ba441e4c72379926599cb3600c92e4f61daac47a843be382e8882ee41916ecc19875c72b91ce38e685d534e68e4956e10a458f31b3d32703eb93c7152a74ff00992f26ecfee62bc5755f333f40f08e89e1996e66d262789eeb6f9dba467ced2c4637138fbc6ad6b7a0e97e22b2361ab4026873bd082559186406465c1079a9db51b3c84132798c9bd509c1c60b739e9c0cf3daa28758b4712895c46f00433f750ce06155b0371c9c7028f694d69ccb5badfb6a1cd1daebef39ed3be1878474e8ee105b3dcbdc234465b87dee8adc1f2880a11bfda033ef5bfa5687a768ba5ae8f608c964bbc04662c7f784b37cc4e7ab1ab297f6723c714732b3caa1a351ce41ce0f1d3a1eb4eb8bbb6b440f7322c4ac76a9638c9eb81f80a7cd0b37ccacb777d17a8f4dff001337c3fe17d1fc3114d0e8f1344970c1e50cecf92a0818dc4e3ad49ae787347f11dbadb6af6c2758c9314992b22138cec75c30ce064743dea5fed6b512c81d82dba2c65672786697255146327e500fe3532ea362f2470ace8649543c6a0f504120fe2012285529bd3997a37a8af1ee72da67c2cf0869b72b73e44976e877225d3ef40474ca2aaab7fc081ae835dd034cf11d8ff676ab1196df789142b142aea080c0a91d98d2cdad59c71fda11d65b70accee872df2ed0022e3e6c96c75a95b55d3a3203dc22b101b693ce080c38f5c1ce297b5a5afbf1fbd07347bafbce56cbe13f842ce759da29aeb6904457126e4e3d5515323d8e4576aa8a8aa8802a280aaa0600038000155ffb46c44822fb426f65f300cff0e37673d3a0cd4b05c43731f9b03874e9b87ff5ea94a0dd934df93bb1a71e8d125145154331758ff8f94ffae63f9b5146b1ff001f29ff005cc7f36a290cd5b5ff008f687feb9aff002152d456bff1ed0ffd735fe42a5a620a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800aa97b64d74f0cd14a61b8b762d13e030f986d60ca719047bd5ba2a65152567b7ddb79a1349ee65be8de64ef33dc31f30a4922ed1ccb1aec47cf603aedf5a46d1117cb68662b240211012a194084301b978ce7793d7ad6ad159fd5e96beeefadeeeff78b923d8c993438e49ae656949fb5290f95cb2b1511b1424f1951e9dfae29f269058b18ee0a379e2e622541dac13cac1e7e61b7a7a569d147d5e96beeefabd5eef50e48f6f3fbcc693489ad144da73e6e218ca42870bb99b2374cd9c30058b018eb566f74c6be587370d1c91a3c6d2051961228572074078e08e953dfdc9b2b29eed50c8d0a16083b91dab39755bb5d2cdecbe4ef92558e1954e635562abe649b5dc614e7386fcab39aa10e6834d45c79dc75e5493dfc9e9f812d415e3d1abb5e8477da65d4781645de776263900411c64c4b012f96040da323682473560e8484b2acc56120308c28e2458c42afbbd001903d6aa1d76f0a442330b4ce1d9576b032e25f2a3445dd9058024e738a8cea2f1eeba4fdeb79934c77b301161d6d5030040da012c73e99ac39b0b76ecda76959b76496ed7dfa917a776f7ea694ba3a3802390c7b23862886d042885fcc191c64310323da95b47467793ce6123b4b2160070f2208c30ff714605539758ba8ae21b7596097262cb856fde8958826201ce02a8eb9393c5327d5659ace369678e14ba7c165de3ecc154c9e5cac922b190e00c0dbce7ad68e786f7bddd63a3e8aebcefdddbfe00f9a9eba6de7d8b63428d188597f723e6489943012796210cdce58051f76aed85a7d86d96dfcc6976924337604e42a8e70a3a019e959106ad7de68b61124220843ccb70f86398f7eedccdbb0188072a7be4d69e937725f59adc4a4162cc0ed5da32a769c7cce08c8e083835542541c97b38b52b35d55adbad7b15070bfbaacf5fc372ed14515d66862eb1ff1f29ff5cc7f36a28d63fe3e53feb98fe6d45219ab6bff001ed0ff00d735fe42a5a8ad7fe3da1ffae6bfc854b4c41451450014514500145145001451450014514500145145001451450014514500145145001451450018a4da0718e3d2968a00896da25b892e80fdf48aa8cc4e784ced00741f78d498ebef4b452492d95afabb777b858318e9c5416d6915aa3471e4877691cb1c92cc7713f9fa54f451caae9db55749faee1613683c9ebd33ede9463ffad4b45300a28a28031758ff008f94ff00ae63f9b5146b1ff1f29ff5cc7f36a290cd5b5ff8f687feb9aff2152d456bff001ed0ff00d735fe42a5a620a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a28031758ff008f94ff00ae63f9b5146b1ff1f29ff5cc7f36a290cd5b5ff8f687feb9aff2152d456bff001ed0ff00d735fe42a5a620a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a28031758ff008f94ff00ae63f9b5146b1ff1f29ff5cc7f36a290cd5b5ff8f687feb9aff2152d456bff001eb0ff00d735fe42a5a620a28a2800a28a2800a28a2800a28a2800a28ae6fc5361ac5cdd69d7fa32192e34ef3a744f30223b908ab13ee232245deb9ed9ed4981d2515c4dae9be2dd22d34bd3ec77cfe55d4f25fdd33c47cd47bbddfbc476040785998142483c601ab569178be26b6176f2cacf0ccc5b741e5a5d167f2d6e42ed630840bb7cbc9ce7776a2fe4c573aca010c320e47a8ae352c7c557be1fbfb5be133caef6e638659628ae248d0c4d7b089ad48454942ba46490707920748960f1647670c5a7588d363492e3ecf6d6896d0a8626236cf771b4b32888fef3cc113163c1c668bf905ced43a11b830c6719cf7e98fae69559580652083d08e45714748d796ed2dcc127f6735ebddec85e1f2f7b5fbdc3c970646f336984ab22a739c822a0b7b1f19d868f35858c53a1511a401a4b62f14999da4683e60ad09fdd28123061927b60ae67d985fc8ef68ae2757baf1069b6336a3a95ebda42d2dbaba46f6a8cb1ada6e97ece67c2976bace43312547cbef6af1bc5b730787e6d31d9639228df537d91eff30885bf791cad1fca46f042f209e9d29dfc82e758480327803a9a45747cec60d8eb839ea323a7b1ae4aff0049d424f135e5f7d8de7b69ed521b598792ca926c991fe69255922e5c67621cd450587892cc595b4304b0c7e7db7daa6b536d9f221b4b68dd65f318190b4a8c80e721724646d145df60b9d91655c6e20163819ee7d052d709358f8b6ffcc7d4a09c436f7d0dd59a5bc96c6e2350b7092f92eec1180ca6378048278a7cf69e3ebc8eeedee6531799a7ed85ad4c68ad7060195f337078dfcf07e6036ed3c63b2e6f2617f2676e194920104afde03b77e6972338cf3d715c969da6ebb6fac2ea718992dee64b74bc8676858b4296651a5976163e6accaabf2363af047354edb4df13594d7df66b28db50962ba6975993cb696591a4dd6cb04af2960a23f97cb7882a951c907977f20bf91dc6e5ddb3237633b7be3d714074625430247500f3d71fcc57122c3c525ffb48a4a674825821959adfed62d9eeada431b007c833985242a7eee76e4e734cb4d23c4369aa5bdedac33c65d0248f2bdbb29437d737128bc0ac4ee30cb9062fe33e94b9bc985fc8eea8ae3b4f8fc6f2b29bd66b58c5c99487681b118b77222664dc5a3f3c28c80188cf41d27f046a57da9457a6f2e1eebc868a36918c2e827f2c35c2c325ae519031e0672070714efe4173aaa28a298cc5d63fe3e53feb98fe6d451ac7fc7ca7fd731fcda8a43385bcf8ada8e9b7d75a647a64522594d25bac865605844c630c405e09db9a87fe1716a7ff0040987feff37ff13589aaaa7f6c6a3f20ff008fa9b9c0ff009e8d557627f717f215c12c63526adb3b1ccea3bbd4e97fe170ea9ff40987feff0037ff001347fc2e2d4ffe8130ff00dfe6ff00e26b9ada9fdc5fc851b53fb8bf90a5f5c9760f692ee74bff000b8b53ff00a04c3ff7f9bff89a3fe1716a7ff40987feff0037ff00135cd6c4fee2fe428da9fdc5fc851f5d9760f692ee74bff0b8b53ffa04c3ff007f9bff0089a3fe1716a7ff0040987feff37ff115cd6c4fee2fe428d89fdc5fc851f5c9760f692ee74bff000b8b53ff00a04c3ff7f9bff89a3fe170ea9ff40987feff0037ff00135cd6c4fee2fe428da9fdc5fc851f5c9760f692ee74bff0b8754ffa04c3ff007f9bff0089a3fe170ea7ff0040987feff37ff115cd6d4fee2fe428da9fdc5fc851f5d9760f692ee74bff000b8b53ff00a04c3ff7f9bff88a3fe170ea7ff40987feff0037ff00115cd6c4fee2fe428d89fdc5fc851f5d9760f692ee74bff0b8b53ffa04c3ff007f9bff0088a3fe1716a7ff0040987feff37ff115cd6d4fee2fe428da9fdc5fc851f5c9760f692ee74bff000b8b53ff00a04c3ff7f9bff88a3fe1716a7ff40987feff0037ff00135cd6c4fee2fe428d89fdc5fc851f5d9760f68fb9d2ff00c2e1d4fbe930ff00dfe6ff00e228ff0085c5a9ff00d0261ffbfcdffc45735b53fb8bf90a3627f717f2147d725d83da4bb9d2ff00c2e1d4ff00e8130ffdfe6ffe228ff85c5a9ffd0261ff00bfcdff00c45735b53fb8bf90a36a7f717f2147d725d83da4bb9d2ffc2e1d4ffe8130ff00dfe6ff00e268ff0085c5a9ff00d0261ffbfcdffc4d735b53fb8bf90a36a7f717f2147d725d83da3ee74bff000b8b53ff00a04c3ff7f9bff88a3fe1716a7ff40987feff0037ff00115cd6d4fee2fe428da9fdc5fc851f5c9760f692ee74bff0b8b53ffa04c3ff007f9bff0088a3fe1716a7ff0040987feff37ff115cd6d4fee2fe428d89fdc5fc851f5c9760f692ee74bff000b8753ff00a04c3ff7f9bff89a3fe170ea7db4987feff37ff115cd6d4fee2fe428da9fdc5fc851f5c9760f692ee74bff000b8b53ff00a04c3ff7f9bff88a3fe1716a7ff40987feff0037ff00135cd6d4fee2fe428d89fdc5fc851f5c9760f692ee7a4786f5e9bc616326a57302da3c3335b08e362e085549376481cfef31f851553c0200d22e368007da9f81c7fcb38a8aefa6f9e1196d7573a20ef14fb9c7eaa3fe26fa87fd7ccdff00a31aaae2aeea83fe26d7ff00f5f337fe8c6aadb6bc4a8fdf97ab38deefd48f1462a4db46da9b888f14629f8a5db45c08f1462a4db498a2e0331462a4db46da2e0478a314fc52eda2e0478a314fdb4628b80cc51b6a4db4d65254edebda8b811927e72aaccb18ccaea095407a6e2381f8d3b1c023907a1af55f045de927c3f6f6d68d1a4d1022f2124799e77591997a9ddd41f4fa570326936da95c5c5cf85ee23bb81dde44d388f2678d724e22490e24500641539c718ae99e1ad08ca32e672dd7f916e1649a77bf432314629ecad1c8d0cc8d14c870f1480ab29f42ac0114bb6b99e9a3208f14629f8a5db45c08f1462a4db46da2e0478a314fdb4bb68b811e28c549b68db45c08f1462a4db46da2e0478a314fdb46de28b81dc780ff00e4113ffd7cbffe8b8a8a5f028c6933ff00d7cb7fe8b8a8af730dfc187a1d94fe08fa1c9ea6bff135bfff00af99bff436aadb6aeea2bff134beff00af897ff436aafb6bc2a8fdf97f89fe67137abf5645b68db52eda36d45c2e45b68db52ed346da2e1722db46da976d2eda2e1721db46da9b6d2058fcc89677f2e067513483aaa120311f414d6ad2efa05c8432336d079f4a5db5ea1e21d074083c3d723ecd15b0b5859ede64015d6451fbbf9fef3166c0209e6bccd031405873deb6af45d1693927757d0a9c5c1d9bbdd5f423db46da976d1b6b0b93722db46d352eda36d3b85c8e291acaee0d4a11fbfb575950faed39c1f63d0d3f5c863b4d6a7485716936dbab36031fba9d44a8571fdddc57f0a5299047ad5abc896e743b0bcce65d3646b2b8c9c9f2a4266b76e7a004ba8ada949384a2f5697347e5bd86ad66be6bf5157599e68d60d5e14d5ad94615a6256e501ff9e772bf38e79c36452a695697e7fe24577be63ff30ebd222b8fa4527fab97f020fb551f2bba1c669aca08db2a823d692ad7569ae75e7a497cc39bbebebbfde134535b4cd6f7713dbcebf7a2914ab0fc0f6f4349b6b4a0d5ee842b6b78a9a9d8afddb6b9e593a7faa987ef10f1d8e3da9c2c74dbd3ff0012aba36d7246469d7a7009ee22b91843e803807de8e48cbf872d7f965a3f9770d3a3f93d0cbdb46dab3756b756137d9afe07b79fb238c671c654f461ee09151edac9dd3b3566ba31116da36d4bb68da695c2e45b68db52eda36d170b916da36d4db6936d170b916da36d4bb68db45c2e763e0818d2a7ff00af96ff00d023a29de0c18d326ffaf86ffd023a2bdfc2ff00029ff84eda5fc38fa1cc6a2bff00133bdffaf897ff00436aafb6ae6a03fe26379ff5de5ffd0daa0c57cfd47fbc9ff89fe670bddfab22db4bb6a4da68db517111eda36d49b68db45c08f6d1b4549b7da8db45c2e47b455dd26285679753ba50f69a6a899a33d24998ed822fc5f93ec2aabfcaa4fe95a1a927d8a0b7d101f9e1ff0049d431d0dc4801543ebe52607d49ad69595ea3da1b79c9ecbf51a7d7b7e6f622b79ae351d3b53b4bd95e79d3fe2696fbd89c4916e338504f19472401e959504eb3f18c67a56859ddfd8351b5bbc655240265f589be49548f7526a29f4d1a5ea57561d441211113de33f346df8a906ae52e7a4a72d6517cadfe2877bc537bedfe447b68db526da36d73dc923db46da936d1b68b811118e6bb4f07787f4ebfd1ae67be1f685bf6f2e6b7dc422ac2c4a021483bb3f3673d0f1deb90db5a7a4dd5e69fa76ad77673b42c4430c6a395f324724b85391b822119f7ae9c2548c6ade6aeb965f2b2b974da52bb5756652d5ec22d2758bad2a172f0c054c45bef05750e149efb738cd55dbeb56d355b7b80b65afb3cd18c883541f3dcc24f38909c9963c9e54f23b76a4bcb19ec1a3f3cac96f38dd6d7711cc52afaa9ecdea0f229558def521f0377b758f9313eeb67f879329184755e0d358363122ee1eb5676d1b6b0e626e4d69aade5b402d4325dd88eb6574be6c7dfee67e643cff091527d9f47bdff008f298e9771ff003eb76c5edc9f48ee00dcbff031f8d533129e47069a4328c38dc2b4559db96569aed2dd7a3dc7cddf55e7fa325bcb2bcd3dc477f03425bee39e637f749172ac3e86a1db9e9cd5ab3d56e6c90c56f2892d9befd9cea2581ba6731be40fa8c1ad2b2d2edb5e9447616d3e9b70df78ed69acce39621ce1a338ce0124678aa54d4dda9bf7bf927ddf67d4695dda3bf67fe7b187b6976d745af784e4d0ed96fa1b83736fb824c1805652dc061824119e08ac1c66a2ad39d2972cd59efdee8524e2ecd59ee47b68db526da36d677111eda4db52eda36fb51703abf070c69b37fd7c37fe811d14ef090c69d2ff00d776ff00d023a2be8f09feef4bfc277d2fe1c7d0e7af97fe26177ff5da4ffd0cd41b6ad5eaff00a7ddff00d7693ff42350edaf9ba8ff00793ff13fccf3dbd5fab23db46da936d1b6a2e1723da28db526da36d170b91eda31526da46e070324f000ea4f6028b8ae5ad29228e69754b850d6fa7289021ff9693938823ffbebe63ec2a913248cf34cdbe5918bcae7a9663924d68ea2bf648adf464eb6ff00bfbdc1c8373201f2f19ff56985fceb3e4c9010756adaa3e551a4beceb2ff0013dfeed8a7d23db7f5641c10d230cf602bb9b8f050bfb2b69e5b964d5a2b6488c8bfea98a0f977a9c9381f2920fbe2b8e64509b48f9718ae82e3c43ace9ba769f6713a492b402695e65dc4c6cc7cb8f2a463318193d79eb5be12a514aa7b5578d925db7fccba728fbdccaeac8e6d1848bbb18f514ec55c16b697503de68818c310dd75a7b7cd35bf6dcbde48fdc72075aac30c3729c83deb9aa4254dd9ecf58be8d7919bbadfe4fa3198a36d49b68c567715c8c80055e9c793a1d8c031fe9534d72e3be1310a7e786a34dd2aef59b86b4b22aa51774b2bfdd41d07404927b0ab7e24b29b4ebbb4b798016f1dba456f20e8e53994e3b1dedcfd6ba2109aa33abcaf95ae54fcdbd7fc8b49f2b959db64fd59ce35aee948078ea6af58dfcb60af6af1adc58cbfebeca4fb8ffed21ea8e3b11514643312b96663b5147258f40001c926afa68f7d2b98eee26b18157cc9aeae14a22274c8271b989e028e49a54e555c97226dad2e969f3e96f51272be9f86df32ee99e198b5a769b4dbdd9a78e1d645dd71149c1f29802148c1c86cfe1515f786e7d36768aeefada38bac52c8c43b8ee442a1db8f6cd3ec3c4874397c9d2ed4369406312f13cae7accee33827a018c62a86a9ab9d5efbed976c8ae1764312f444049c73d4e49c9adea3c2aa5a479aadf5e5ba8f9fc8a6e9285ed79795edff000c3fecda1c47335fcd73ea96f06ce7d9e661c7fc068375a345911698d2e3a3dccec7ff001c8820fd4d32d2c6e6f8335b201027facba90f970a7fbf2371f80c9a93ced1ec4feec7f6add8e8ee0a5a29e0f09c3c98f7c0aca3cd6e6508528bead5feee6bb7f212bef6515ddabfdd72c5adceb178a65d2aded74fb74ff5978218e38d31c12d2cc1c9233fc3cd4b69a8dc2ea56b159de4dab6a723155bc9d9e3b480107cc658010d26d4ddcb103b81595777f777ecad76ed204188e2036c48071848d70a38f6ab10992cb4a9af3ee5cea39b5b5ff661523ed1274fe238418f7ad69d77cd68b6e31f7a52969a2fe58ad13635277ddb4b56df9765d2e58d77c4f2eb85ad9008b4e8e425319dd2edc8466cf41df18ac81b5865791504d19651b79c54b69132292dc67a0ae7ab52551ba9295e4f4b744bb2264dbd5bbb1f8a368a936d1b6b1b8ae47b451b4549b68db45c2e74be1518d3e5ff00aeedff00a02514be1818b097febb37fe829457d360bfdda97f84f428ff000e3e8615e8ff004ebaff00aed27fe846a2c54f783fd3aebfebac9ffa11a8b15f3351fef27fe297e679cdeafd58dc518a7628c545c57198a314fc518a2e17198abba624714936a93aee86c006453d1ee1b8853a8e87e638f4aa8d90380493c003a9278007d6af6a205b241a3a1c8b5fdeddb0e8d72e39ef83e5ae147e35ad2b2bd57b43e1f39bd97ea547acbf976f5e867fcec5a5958b48e4bc8c7a96639627ea4d3235dc4c87f0a74b9388d7a9ebf4a902e0003a0acdbd3bb6211206b8962b64e5a6758c7d5c851fceac6b0eb73a85d18f8891bc987d0244046b8f621735268ecab7925e70458c324f83d3701b231f8bb0aa072b1924e58f53ea4d6bb528aeb39b7f28edf8b63fb2bcddfe48a96ab73697097b6eed0cd11f9254e0fb83ea0f706b7a0b6875f940b1096baa1e67839104ab9f9a68f00ec619e57bf6acd42a8a031c7735a3a56fd1e55d7e425222ac96f683fd65c9618e33f7501c12d8edc56b427cf2e49eb4b79df68aee9f4638bbbb3f87ed792ee4f7de15d56c993cbdb7313e7748a44623239f9fcc20007d73550da6996e7fd36f7cf71d60b25ddf9cd2009f9035675af1236bd0476e61fb35ba3079159b73338fba33818039fad6580b8e0f14abcb0f0a8fd8c799779b764fc969f88e6e0a5ee2baeeefbf9235f4cd7e2d22726cec163b49062605d9e6623eeb176c2f19e98fc68d5bc4f35fcc245b6805bc6088e3b98d656c9ead923e5ce318158ad3283b1019243f76351924fa003935d659f81b4fbcd3e393526985e4ca1d8a3797e5e79d8aa41190383b81e7d2b6c3cb175e2e9c25cb05ef3d125e88a83ab3f762f45abe867e817f0fda46a57761696f676d912dec68c9b5c8c2aa2a92198e7a01c56a789b5ad16f2d23b30bfda259d64d9148502edce18b856e79c62b95bcb9b99e66b668d22b4b27786d6da2398d154952c09e599b192c79354e795e25c2aed2dd6878b9c232a10e595f47392ebd6c9740f6ad2705669e976bafa7634a497c3fb332dbddc2bd098a547c0f51b92bb4b9d2fc369a192f6d6efa7c518991d941070372bee18662df5c9e95e7568b25ecf15bfde926758d3d32c719fc3357b57bb866be9446cc6d2d8886da3c9281611e5ab28e9ce339a74311eca1394a9c64db5156496bbbfb821539536e29ded1d15b5ff22bc93deea31c6da949b820fdddba0091463b048d70a3f9d204451d0015125d991b6edf98f4a97ca2c7321cfb0ae29ca7293737abf9fc8c9dfaeafcc582296fae61b1b51fbd9dc206eca3ab31f650093536a0f15e5e130ffc79dba8b7b34ffa671f1b8fbb9cb1fad59b61f62d366be0313de6eb4b51dc47c19e51fa20f7cd51388d38ec38ab93e4a7182f8a769cbbf2f45fa8f649757abf4e84440790201855eb52e29234c2e4fde6e4d3f158b7d3b0ae3314629f8a314ae2b8cc518a7e28c5170b9d1786b8b193febb37fe829451e1ce2ca4ff00aecdff00a0a515f5381ff75a5fe13d2a3fc28fa18979ff001fb73ff5d5ff00f42350d4b79ff1fb73ff005d64ff00d08d455f3153f893ff0014bf33ce7bbf5614514540828a291b38c282589c281d493c003f1a3502ee9bb2169b5594068ec403121e8f70fc44bdb217ef1c7a552cb7cd248c59d896763c92c7924fd4d5dd48adb0874946cada65ee98746b97197faec185155e2b1bcbe4df0a88ed01fdede4c7642a3bfcc7ef1f6504d744e326e3460b99c7595bf99fc4fe5b14d3768a57b6f6efd7eed8af1e09695b8f4cd5bb7b09ee904ef8b7d3c11e75dca7cb4db9e4231fbcdd40c03cd48b2e9b6400b58ffb42e17fe5e2752b029ff621ead8f56fcaabdcdcdc5e4825bd95a671f7437dd51e8aa30a07d05271a70779be792fb107a2f597f90ac96fabecbfcceef52b1d1a0d1270d1a476622041848466db8640afce4b10319ce6b8791b402803fdba13d460c527f48e8b1b0bed564fb258664117ccdbd888a3cf00f39e4f600669f240343b90fac4692ea872d65640ee895412a2e256ee320ed5fcfdbb2a4e55f96a2a31a74a2ace525a69dad6f9235949ced2e4518a5bb57dbcced34bd17461a5c39b649a395048f2dc463cc391bb2dbb3b71e99e2b93ba82d2f2ee6b9fed88e562c446658e440a809da8b852303d862b364bd9e632bcf7323b4c774ff31018fba8c0c76c555fb5a93b15700f00d675b130ab08c214528c77d6d7b6db0a535249282497e3f71d8e8fe11d2efad4dd5fca2f0c84aa181d9635038e301096cf5cd625c69ba46917b3d95c49737ef0b7cb165628c2b0dcaaf20cb33608ced02a4d1af6ef4dd3f529ad6e0aa811ac6870544d2b637a860704229f6f5aca3749e61f31cbcae4b3c8c724b1e4924d3ab5a92a34a34e9253b735dabd95edd77bb5d42528f24546093deef53446a77312b47631c5611b0c1fb32ed723fda95b2e4fe34fb7d7359b387c8b7ba3e583b8190090824e48dce09c1359a655cfcbf3521f364047dd535caabd74eeaa4a2f6d1dadf244734ff99af465e5169a9ef7d254457e80b4da613c38032cf6a4f5f529d7d2a8aa0972d28f9ba143d54f7047622ab0b49239166524346c1d1d4e1948e430239041addb764f104a96b2622d5d81f2eed47c93051922745e8c002430ebdeb46a356dc9eed57dbe193f2ecc76e67a7c5b793f4ecc6692ab6cf73a828e2c61664ffaeb2feea2cfe2c4fe159ecaa21208ebdeba3d5b409b47d1888a513a19964bc908d8db40d91a85c9c80cdcf35ce48773220e8793535e9ce972529ae56939bf3727dfd12092946d17a34aefd58c82d963f9f39635662825bb9e2b487fd6cec117db3d58fb01c9a6d5cb56369633ea1d26b9dd69647b8047efe51f418507d4d4423cf3f7be18fbd27e4bfcc94aef5db77e9d466a13c53dd6cb6cfd92d545bdafba2705ce00c976cb66a937cf204fe15eb4e24449f41c5244a42e4fde6e4d4ca4e5294deef65d1797c81b6f57d47d14515020a2928a005a28a4a00e8fc3bff1e527fd753ffa0a5149e1cff8f293feba9ffd0528afaac0ff00ba51ff0009e8d0fe147d0c2bc3fe9d73ff005d64ff00d08d459a92f0ff00a75d7fd7693ff42350e6be66a2fde4ff00c52fccf3deefd58ecd19a6e68cd45842960064f4ae9745f0cddb471eaed247e7ec32d95b38250395cc4f2b0c9e09ce00ae6480c307a56ed9f8bafecac56cbc849a48942433b120051c28751d703d08aeac1ba119b956be8af1b7f37c8d2938295e77d36f52086c1e066fb3d8cdaade863beea7468ed03e7e62a1b6f99ce796205437165a8dd49e7eb17f6c8e9c244f329f2c7a24500603f0151dd4b69ac3902fe4b4bc739682ee467b7627a88e63929ec187b66a95d5b5ce9ee20b9b768588f91dbee30f5471956fc0d6b55a517cb072a6ddfdd95a3ff6f5b5bfabb84ad6d1371f2765f3b6bf7b2f1874583067be967f55b78b68ff00bea5619fca99f6ed29322d74d79cf67b998e3fef98820fd6a8845eb2364d2f9b1af00fe02b9954b7c308affb76ff00fa55c9bdb5492f34aff8b3a0d17c4dfd9d2c8b776b1476b2e302d23da5587760cc4b023de99ab6a1a6788af11e42d612c20a59dd4c4189c360b2cc0729c8e1b247ad6179a4fdd527eb552e9a52d82303b015b47155a50f65271943aa6ada76d3629549b5caecd7997ef21b8b49bec973098a623209e5594ff146c3861ee2abada2236e2738e7156b4fd41a1b51637918bbb2e488243878c9fe2b793aa1f6e87f1abf06853ea4e068b3a4f68df7a498ec9213fdc99002493d8a8c1a8f64e7a506e57d1c1fc4bfcd79a2795bf835f2ebff000510ce890e8b696e060ddcd2dcbe3ae1310a67dbef5641b5266da0f1d6b7b5fb59ec6f2ded255db0c36f1c76f20fbafb466461e877939ac88f9766fc2956e6854717a72250b3f24bf31caea4d6d6b2fb912a80a0003a52e69b4573ee40ecd11493da5cc77d64db2e613b973c83d8861e847069b45545b8b524ecd3bdfcc17e5aa37353f10dceb5a2872ab6e914e23be8412c4823742c09c614953d7be2b02321dcb8e8381572c22fb54971a59385d46168d0e7004f1fef6163ff00025c7e3597601c212dc7623d0d745793ab18d694aedae47eb1ff00872e4dc9293776d5bee2f4714b733476b6e3334cc113d327b9f61d4d58d4678a5b910da9cd9d9a882dbfda0bf7e4fabb64e7d314eb36365673ea9d279336961ea1987efa51feea700fa9aa1c469c76159b5c94947ed54b4a5e515f0af9eff70b656eb2d5fa74fbc473bdc2761c9a96a28810371eadcd3eb26ba76258ecd19a6d14807668cd368a007668a6d1401d2786ff00e3ca4ffaecdffa0a514786bfe3c64ffaecdffa0a515f5181ff0075a5fe13d2a1fc28fa1cfde9ff004ebaff00aed27fe846a1cd497c7fd3eeff00ebb49ffa11a8335f37517ef27fe297e679ef77eac7e68cd333466a6c21f9a1b25481d714ccd19a00a421937fcc0919e4d69d95fddda279114ab2da9fbf653af990b7fc05beefd57150e69ac8adcf43ea2b455249de2dc5f75fa8eef74eccbc2db48bc3fb890e9b727fe584ec5edd8ffb32fde4ff0081023dea2b9b3b8d3dc25e4062ddf71f86471d728e32a7f035509751861bd6ad59ea57568862b770f6edf7ed265f3216e73cc6dd39ee306a9ca13f8d72bfe786df38ff009068f7d1f78ff90c0c3b50707a8cd5adba4de1fdd39d2ee8ff0004a4bda31e07cb272f1e4f3f3640a82eed6eec0a8bc88a23f31cc3e689c1e4149172a723dea654649732f7a3fcd1d57cd6ebe60e2d2beebbafd48dd55faf07b1157f42d79fc3d712c934467b59c01204c0752b9dac33c1ea72322b3b39a0f2083c834a9549d29a9c778f708b7169add6c6df8ab533a85ddbb850b68b02cd68dddc4c0162de8415db8f6ac58f841ea696f035c68514899dfa54e627c0ff0096172772127fd991587e350c05bca1bfad6b89bca5ed5bbfb4b4bf0dbe5b153d5f36fcdafe04f9a334ccd19ae7b103f3466999a3345809166920923b88b892160e87dd4e47f2ab1a9419d6bc9b2195d4f64f68bff5df9c7b056c83e98aa32b958c951922bd1edf42d322d360f2d81920b7758351c83222caa4b488e7200f9891d857661283ad19c1fc31b4bcefdbe68d29c39d4974566711a9cb135cada5b1cda582fd9e13fde60732cbff00037c9fc055073bdc20e83934c8dc2c59ce40e030ef8eff008d2c4081b8f56ae69c9ca5293f925d3a7dc910eedb6fee26cd19a6668cd45843f3466999a3345807e68cd3334668b00fcd19a6668cd1603a8f0cff00c78cbff5d9bff414a293c31ff1e12ffd766ffd0528afa7c17fbad2ff0009e851fe147d0e72f8ff00c4c2effebb49ff00a19a83352df9ff00898de7fd7797ff00433500209af9da8bf793ff0014bf3381eefd58f2556369a4658e18c65e4720281ee4d634fe2cd3125f22ca296fa53c0f2d76a93e8b9cb1ff00be6ab5fc136bbe213a44f21874fb28fce318e0b8c2ee65f563bf00f619f7abf74da7698915a437274985c1263b65267940e01790067c715d10a34a3c8aa2954a938f3a846ea318bdaed5db7e868a3156e6bc9b57b2d92f32d595e3dec45e5b596ce65fbf14ca40c1e851c819fe75673ef5956d04df6882e74ebbbb92cf27ed42f3251d7fe99891558927b81c7ad691604e474ac6b423197bb649ebcbade3e4ee44924f4fbbb790ff00c68fc6a3cd19acac224cfbd35955bd8fad373466801097518237ad5ab2d4aeacd5a3b694181ffd65a4a0490b7aee8db8edd460d57cd35955b93c1f5ab8c9c5dd3717dd02d354ecfc8d2c6917a7e5274aba3fc0d992d18fb372f1e7df20557bbb3bcd3f69bc8f646ffeaa7521e27f4d922e54e7d3ad532645183f3ad58b2d4aeac432d9cbb637ff005b6d200f13fa868db2a73ebd7deb4bc27f1ae57fcf04bf18ec3d1eebe71fd517348d935dc9a6c84795a8c4f6e4b74127df85b8ee1d47e759b0331428e30e876b03d411c106b56c6df4ed66fededadf7e91a8b3875317ef60629990940c4346d85240c915b3e2cf0cdad9c371aed93b4721903dd42c728fe63004a7756c9cd6df569cf0fcd16a4a9b6d35d62f56bcadfa96a9b70bab3516f54fa6ff0081cb7e3467dea307233466b8ac64499f7a3f1a8f34668b01267de9cd75762d1acfed528b22306df79d98ebb76e718f6a8775237cca54f434e2dc5e8dabe8eda5d0c892712158870055afc6aa476e237dc4e7d054f9a72b5f4063f3ef4b9f7a8f3466a6c21f9f7a33ef4c9678ad2c67bf9a3f3bca68e348b76c1990b6598804f017a0f5ab5a7da6a1aad9c77d61656ee2607640676f37224584e576f006e0d9e98ade9616a555785b5be8df63aa9606bd5a4ab4795536dc79a72b6aba58833ef467deadb69da844cbf68b6b54858a86905c92d97d980b190acc774817d33df18aa5ac4d36802d3fb474f5f3ae8339844ae362aedc02d8ea437231c568f015d2bbe5b2f3348e598993518fb36dec94ff00e00fcfbd267de9d7512dbdccb0212511885cf5c76048e335166b95c6cda7d1dbee389ab36bb68759e16ff907cbff005ddbff00404a293c27ce9f2ffd776ffd0128afa4c1ff00bb52ff0009e851fe1c7d0e67503ff132bcff00aef2ff00e866ab3c891a3492b048d7ab1f5e800f524f402a7d40ff00c4caf7febbcbff00a1b552b888ce88158249148b344c46e5dc9d030e320fd7debc1924eac93d1733bbf99c2fe277eec565b2bc304ac01b805becb2026397e5fbea08dac40ee0d432c12b28961d5e4855b76d6658dc1db92e14ed56f94039e6965b596e278ef65942ddc054db940446a0125c329639dea769a80e909b02acc720108186550bc6d14c5467fe5a1218fb8ad20e0adfbcb5b64e2a693d74575b6df88d5bbfcad7b0eb14ba8a62e75617d16099e0954ee50bc161f3650ae476fc2af25c413161038729f7b1d076ebd0f208e2ab3d9618bd9b08bcc8da2b80e19cb6f20b4818b677f1dc91d3d29d6d6df657959587952636c28085047fcb4209237b0e0edc038cf5a553d9cef2e6f7ac94572a57ef7b2b7a04acf5bebe897df62d668cd328cd616247e68cd333451601f9a334ccd19a2c21f9a6b2ab75e0fad2668a2c30579e07596272b2464347229c3291d08357354f106a9abc2916a13e618ceef291420661d0be3ae3f2aa79a8e68fcc5f97ef0ad21524938a935196e9697f51a6f6bb49ee9752549564195a766ab5bc4d164b1e4f6a9b350d24f4d8561f9a334ca334ac21f9a334ca3345863f3466999a3345843f3466999a334580926b2bcd4b49bcb4d3e17b9b9f3207314632db47980b63d0122a3b0f0c15b264d4b46d586a7fbcf2e7b78c18f0571102a5d4f0c724fe1f4b9a6ea115819d6e2292682e55558412b4122946dc08923c1c1e411575b5ad25e5f39ecefd9802003a84d8009ce060e719f7af470d528c692539da4afa3bf7f43d6c1e3e1470ca8ca5cb6939689b7abfc4a11690560804be17bf378b195ba9026e8d9cc5b0491a31c656444619e3e67c8e0552d77c3da85e5d432689a0df5bdb2c0893473444334c0b6f7003bf046df4e9d2b7175ad2511235b3bedb18da99bf90e067760e783e9cf6e298daae8ccfbdacef88f94ac7f6f9405299c30230d93ea4f615bbaf876adcebe49afd0e986694a33e6539697b5d49ad7c9b2a6a47fe26372a7ef2c8cac3d083820d57cd2dc4ed737335d300a67769360e76ee39c64f271ea7ad479af225672935b36d9e0bd5b7ddb7f79d7f847fe41d2ffd776ffd023a28f087fc8366ff00aeedff00a047457d160ffdda97f84efa3fc38fa1caea2c3fb4ef7febe25ffd0daabee1eb5e8dfd99a749fbc7b4819dfe67668d0924f249247249a3fb2b4bff009f2b7ffbf49ffc4d7953c2de727cfbb6f6ff0082723a7abd7af63ce770a378af46fecad2ff00e7cadffefd27ff001347f65697ff003e56ff00f7e93ff89a9faa7f7fff0025ff00821ecfcff03ce770a378af46fecad2ff00e7ca0ffbf49ffc4d1fd95a5ffcf95bff00dfa4ff00e268faa7f7ff000ff821ecfcff0003ce778a378af46fecad2ffe7cadff00efd27ff1347f65697ff3e56fff007e93ff0089a3ea9fdffc3fe087b3f3fc0f39de28de2bd1bfb2b4bff9f2b7ff00bf49ff00c4d1fd95a5ff00cf95bffdfa4ffe268faa7f7ff0ff00821ecfcff03ce778a378af46fecad2ff00e7cadffefd27ff001347f65697ff003e56ff00f7e93ff89a3ea9fdff00c3fe087b3f3fc0f39de28de2bd1bfb2b4bff009f2b7ffbf49ffc4d1fd95a5ffcf95bff00dfa4ff00e268faa7f7ff000ff821ecfcff0003ce778a378f5af46fecad2ffe7cadff00efd27ff1347f65697ff3e56fff007e93ff0089a3ea9fdffc3fe087b3f3fc0f39de28de2bd1bfb2b4bff9f2b7ff00bf49ff00c4d1fd95a5ff00cf95bffdfa4ffe268faa7f7ff0ff00821ecfcff03ce778a378af46fecad2ff00e7cadffefd27ff001347f65697ff003e56ff00f7e93ff89a3ea9fdff00c3fe087b3f3fc0f39de28de2bd1bfb2b4bff009f2b7ffbf49ffc4d1fd95a5ffcf95bff00dfa4ff00e268faa7f7ff000ff821ecfcff0003ce778a378af46fecad2ffe7cadff00efd27ff1347f65697ff3e56fff007e93ff0089a3ea9fdffc3fe087b3f3fc0f39de28de2bd1bfb2b4bff9f2b7ff00bf49ff00c4d1fd95a5ff00cf95bffdfa4ffe268faa7f7ff0ff00821ecfcff03ce778a378af46fecad2ff00e7cadffefd27ff001347f65697ff003e56ff00f7e93ff89a3ea9fdff00c3fe087b3f3fc0f39de28de3d6bd1bfb2b4bff009f2b7ffbf49ffc4d1fd95a5ffcf95bff00dfa4ff00e268faa7f7ff00f25ff821ecfcff0003ce778a378af46fecad2ffe7cadff00efd27ff1347f65697ff3e56fff007e93ff0089a3ea9fdffc3fe087b3f3fc0caf071ce9937fd7c37fe811d15ac2086d7f776b1ac287e62b1a8404f4c90a07381457b1875c94611decad73ae9e908af23fffd9, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Carrinho`
--
ALTER TABLE `Carrinho`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idProduto` (`idProduto`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `Produto`
--
ALTER TABLE `Produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Produto`
--
ALTER TABLE `Produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Carrinho`
--
ALTER TABLE `Carrinho`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idProduto` FOREIGN KEY (`idProduto`) REFERENCES `Produto` (`idProduto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
