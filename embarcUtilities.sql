-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: embarcUtilities
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cs_accounts`
--

DROP TABLE IF EXISTS `cs_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountNo` varchar(64) NOT NULL,
  `serviceName` varchar(128) NOT NULL,
  `registeredTo` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='list of courier service accounts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_accounts`
--

LOCK TABLES `cs_accounts` WRITE;
/*!40000 ALTER TABLE `cs_accounts` DISABLE KEYS */;
INSERT INTO `cs_accounts` VALUES (1,'530760685','DHL','Embarc Information Technology'),(2,'530706270','DHL','Embarc Information Technology');
/*!40000 ALTER TABLE `cs_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_dhl530706270`
--

DROP TABLE IF EXISTS `cs_dhl530706270`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_dhl530706270` (
  `type` varchar(8) DEFAULT NULL,
  `weight` float(8,1) DEFAULT NULL,
  `A` float(8,2) DEFAULT NULL,
  `B` float(8,2) DEFAULT NULL,
  `C` float(8,2) DEFAULT NULL,
  `D` float(8,2) DEFAULT NULL,
  `E` float(8,2) DEFAULT NULL,
  `F` float(8,2) DEFAULT NULL,
  `G` float(8,2) DEFAULT NULL,
  `H` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='prices of dhl 530706270 account';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_dhl530706270`
--

LOCK TABLES `cs_dhl530706270` WRITE;
/*!40000 ALTER TABLE `cs_dhl530706270` DISABLE KEYS */;
INSERT INTO `cs_dhl530706270` VALUES ('DOC',0.5,718.00,777.00,837.00,922.00,899.00,984.00,1004.00,1239.00),('DOC',1.0,885.00,972.00,1076.00,1172.00,1161.00,1252.00,1354.00,1641.00),('DOC',1.5,1052.00,1167.00,1315.00,1422.00,1423.00,1520.00,1704.00,2043.00),('DOC',2.0,1219.00,1362.00,1554.00,1672.00,1685.00,1788.00,2054.00,2445.00),('DOC',2.5,1386.00,1557.00,1793.00,1922.00,1947.00,2056.00,2404.00,2847.00),('DOC',3.0,1252.00,1277.00,1957.00,2191.00,1327.00,1669.00,2753.00,3619.00),('DOC',3.5,1361.00,1388.00,2126.00,2270.00,1433.00,1768.00,2937.00,3920.00),('DOC',4.0,1470.00,1499.00,2295.00,2349.00,1539.00,1867.00,3121.00,4221.00),('DOC',4.5,1579.00,1610.00,2464.00,2428.00,1645.00,1966.00,3305.00,4522.00),('DOC',5.0,1688.00,1721.00,2633.00,2507.00,1751.00,2065.00,3489.00,4823.00),('DOC',5.5,1750.00,1814.00,2792.00,2650.00,1799.00,2164.00,3663.00,4858.00),('DOC',6.0,1812.00,1907.00,2951.00,2793.00,1847.00,2263.00,3837.00,4893.00),('DOC',6.5,1874.00,2000.00,3110.00,2936.00,1895.00,2362.00,4011.00,4928.00),('DOC',7.0,1936.00,2093.00,3269.00,3079.00,1943.00,2461.00,4185.00,4963.00),('DOC',7.5,1998.00,2186.00,3428.00,3222.00,1991.00,2560.00,4359.00,4998.00),('DOC',8.0,2060.00,2279.00,3587.00,3365.00,2039.00,2659.00,4533.00,5033.00),('DOC',8.5,2122.00,2372.00,3746.00,3508.00,2087.00,2758.00,4707.00,5068.00),('DOC',9.0,2184.00,2465.00,3905.00,3651.00,2135.00,2857.00,4881.00,5103.00),('DOC',9.5,2246.00,2558.00,4064.00,3794.00,2183.00,2956.00,5055.00,5138.00),('DOC',10.0,2308.00,2651.00,4223.00,3937.00,2231.00,3055.00,5229.00,5173.00),('DOC',10.5,2392.00,2742.00,4316.00,4109.00,2331.00,3155.00,5457.00,5403.00),('DOC',11.0,2476.00,2833.00,4409.00,4281.00,2431.00,3255.00,5685.00,5633.00),('DOC',11.5,2560.00,2924.00,4502.00,4453.00,2531.00,3355.00,5913.00,5863.00),('DOC',12.0,2644.00,3015.00,4595.00,4625.00,2631.00,3455.00,6141.00,6093.00),('DOC',12.5,2728.00,3106.00,4688.00,4797.00,2731.00,3555.00,6369.00,6323.00),('DOC',13.0,2812.00,3197.00,4781.00,4969.00,2840.00,3655.00,6597.00,6553.00),('DOC',13.5,2896.00,3288.00,4874.00,5141.00,2949.00,3755.00,6825.00,6783.00),('DOC',14.0,2980.00,3379.00,4967.00,5313.00,3058.00,3855.00,7053.00,7013.00),('DOC',14.5,3064.00,3470.00,5060.00,5485.00,3167.00,3955.00,7281.00,7243.00),('DOC',15.0,3148.00,3561.00,5153.00,5657.00,3276.00,4055.00,7509.00,7473.00),('DOC',15.5,3232.00,3652.00,5246.00,5829.00,3385.00,4155.00,7737.00,7703.00),('DOC',16.0,3316.00,3743.00,5339.00,6001.00,3494.00,4255.00,7965.00,7933.00),('DOC',16.5,3400.00,3834.00,5432.00,6173.00,3603.00,4355.00,8193.00,8163.00),('DOC',17.0,3484.00,3925.00,5525.00,6345.00,3712.00,4455.00,8421.00,8393.00),('DOC',17.5,3568.00,4016.00,5618.00,6517.00,3821.00,4555.00,8649.00,8623.00),('DOC',18.0,3652.00,4107.00,5711.00,6689.00,3930.00,4655.00,8877.00,8853.00),('DOC',18.5,3736.00,4198.00,5804.00,6861.00,4039.00,4755.00,9105.00,9083.00),('DOC',19.0,3820.00,4289.00,5897.00,7033.00,4148.00,4855.00,9333.00,9313.00),('DOC',19.5,3904.00,4380.00,5990.00,7205.00,4257.00,4955.00,9561.00,9543.00),('DOC',20.0,3988.00,4471.00,6083.00,7377.00,4366.00,5055.00,9789.00,9773.00),('DOCMUL',30.0,215.00,233.00,300.00,354.00,240.00,254.00,509.00,598.00),('DOCMUL',50.0,201.00,221.00,288.00,344.00,232.00,243.00,495.00,598.00),('DOCMUL',70.0,183.00,202.00,273.00,305.00,232.00,226.00,441.00,598.00),('DOCMUL',100.0,183.00,202.00,273.00,305.00,232.00,226.00,441.00,598.00),('DOCMUL',9999.0,183.00,202.00,273.00,305.00,232.00,226.00,441.00,598.00),('NDOC',0.5,1006.00,1016.00,1141.00,1416.00,802.00,1121.00,1399.00,2217.00),('NDOC',1.0,1022.00,1033.00,1312.00,1579.00,930.00,1200.00,1633.00,2302.00),('NDOC',1.5,1063.00,1074.00,1481.00,1740.00,1059.00,1318.00,1920.00,2654.00),('NDOC',2.0,1104.00,1115.00,1650.00,1901.00,1188.00,1436.00,2207.00,3006.00),('NDOC',2.5,1145.00,1156.00,1819.00,2062.00,1317.00,1554.00,2494.00,3358.00),('NDOC',3.0,1252.00,1277.00,1957.00,2191.00,1327.00,1669.00,2753.00,3619.00),('NDOC',3.5,1361.00,1388.00,2126.00,2270.00,1433.00,1768.00,2937.00,3920.00),('NDOC',4.0,1470.00,1499.00,2295.00,2349.00,1539.00,1867.00,3121.00,4221.00),('NDOC',4.5,1579.00,1610.00,2464.00,2428.00,1645.00,1966.00,3305.00,4522.00),('NDOC',5.0,1688.00,1721.00,2633.00,2507.00,1751.00,2065.00,3489.00,4823.00),('NDOC',5.5,1750.00,1814.00,2792.00,2650.00,1799.00,2164.00,3663.00,4858.00),('NDOC',6.0,1812.00,1907.00,2951.00,2793.00,1847.00,2263.00,3837.00,4893.00),('NDOC',6.5,1874.00,2000.00,3110.00,2936.00,1895.00,2362.00,4011.00,4928.00),('NDOC',7.0,1936.00,2093.00,3269.00,3079.00,1943.00,2461.00,4185.00,4963.00),('NDOC',7.5,1998.00,2186.00,3428.00,3222.00,1991.00,2560.00,4359.00,4998.00),('NDOC',8.0,2060.00,2279.00,3587.00,3365.00,2039.00,2659.00,4533.00,5033.00),('NDOC',8.5,2122.00,2372.00,3746.00,3508.00,2087.00,2758.00,4707.00,5068.00),('NDOC',9.0,2184.00,2465.00,3905.00,3651.00,2135.00,2857.00,4881.00,5103.00),('NDOC',9.5,2246.00,2558.00,4064.00,3794.00,2183.00,2956.00,5055.00,5138.00),('NDOC',10.0,2308.00,2651.00,4223.00,3937.00,2231.00,3055.00,5229.00,5173.00),('NDOC',10.5,2392.00,2742.00,4316.00,4109.00,2331.00,3155.00,5457.00,5403.00),('NDOC',11.0,2476.00,2833.00,4409.00,4281.00,2431.00,3255.00,5685.00,5633.00),('NDOC',11.5,2560.00,2924.00,4502.00,4453.00,2531.00,3355.00,5913.00,5863.00),('NDOC',12.0,2644.00,3015.00,4595.00,4625.00,2631.00,3455.00,6141.00,6093.00),('NDOC',12.5,2728.00,3106.00,4688.00,4797.00,2731.00,3555.00,6369.00,6323.00),('NDOC',13.0,2812.00,3197.00,4781.00,4969.00,2840.00,3655.00,6597.00,6553.00),('NDOC',13.5,2896.00,3288.00,4874.00,5141.00,2949.00,3755.00,6825.00,6783.00),('NDOC',14.0,2980.00,3379.00,4967.00,5313.00,3058.00,3855.00,7053.00,7013.00),('NDOC',14.5,3064.00,3470.00,5060.00,5485.00,3167.00,3955.00,7281.00,7243.00),('NDOC',15.0,3148.00,3561.00,5153.00,5657.00,3276.00,4055.00,7509.00,7473.00),('NDOC',15.5,3232.00,3652.00,5246.00,5829.00,3385.00,4155.00,7737.00,7703.00),('NDOC',16.0,3316.00,3743.00,5339.00,6001.00,3494.00,4255.00,7965.00,7933.00),('NDOC',16.5,3400.00,3834.00,5432.00,6173.00,3603.00,4355.00,8193.00,8163.00),('NDOC',17.0,3484.00,3925.00,5525.00,6345.00,3712.00,4455.00,8421.00,8393.00),('NDOC',17.5,3568.00,4016.00,5618.00,6517.00,3821.00,4555.00,8649.00,8623.00),('NDOC',18.0,3652.00,4107.00,5711.00,6689.00,3930.00,4655.00,8877.00,8853.00),('NDOC',18.5,3736.00,4198.00,5804.00,6861.00,4039.00,4755.00,9105.00,9083.00),('NDOC',19.0,3820.00,4289.00,5897.00,7033.00,4148.00,4855.00,9333.00,9313.00),('NDOC',19.5,3904.00,4380.00,5990.00,7205.00,4257.00,4955.00,9561.00,9543.00),('NDOC',20.0,3988.00,4471.00,6083.00,7377.00,4366.00,5055.00,9789.00,9773.00),('NDOCMUL',30.0,215.00,233.00,300.00,354.00,240.00,254.00,509.00,598.00),('NDOCMUL',50.0,201.00,221.00,288.00,344.00,232.00,243.00,495.00,598.00),('NDOCMUL',70.0,183.00,202.00,273.00,305.00,232.00,226.00,441.00,598.00),('NDOCMUL',100.0,183.00,202.00,273.00,305.00,232.00,226.00,441.00,598.00),('NDOCMUL',9999.0,183.00,202.00,273.00,305.00,232.00,226.00,441.00,598.00);
/*!40000 ALTER TABLE `cs_dhl530706270` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_dhl530760685`
--

DROP TABLE IF EXISTS `cs_dhl530760685`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_dhl530760685` (
  `type` varchar(8) DEFAULT NULL,
  `weight` float(8,1) DEFAULT NULL,
  `A` float(8,2) DEFAULT NULL,
  `B` float(8,2) DEFAULT NULL,
  `C` float(8,2) DEFAULT NULL,
  `D` float(8,2) DEFAULT NULL,
  `E` float(8,2) DEFAULT NULL,
  `F` float(8,2) DEFAULT NULL,
  `G` float(8,2) DEFAULT NULL,
  `H` float(8,2) DEFAULT NULL,
  `US` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='prices of dhl 530760685 account';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_dhl530760685`
--

LOCK TABLES `cs_dhl530760685` WRITE;
/*!40000 ALTER TABLE `cs_dhl530760685` DISABLE KEYS */;
INSERT INTO `cs_dhl530760685` VALUES ('DOC',0.5,555.00,597.00,658.00,741.00,712.00,798.00,831.00,866.00,691.00),('DOC',1.0,716.00,779.00,897.00,980.00,968.00,1064.00,1171.00,1264.00,939.00),('DOC',1.5,877.00,961.00,1136.00,1219.00,1224.00,1330.00,1511.00,1662.00,1187.00),('DOC',2.0,1038.00,1143.00,1375.00,1458.00,1480.00,1596.00,1851.00,2060.00,1435.00),('DOC',2.5,1199.00,1325.00,1614.00,1697.00,1736.00,1862.00,2191.00,2458.00,1683.00),('DOC',3.0,1428.00,1525.00,2020.00,1580.00,2340.00,2659.00,2930.00,2157.00,1672.00),('DOC',3.5,1540.00,1651.00,2124.00,1713.00,2520.00,2806.00,3027.00,2364.00,1820.00),('DOC',4.0,1652.00,1777.00,2228.00,1846.00,2700.00,2953.00,3124.00,2571.00,1968.00),('DOC',4.5,1764.00,1903.00,2332.00,1979.00,2880.00,3100.00,3221.00,2778.00,2116.00),('DOC',5.0,1876.00,2029.00,2436.00,2112.00,3060.00,3247.00,3318.00,2985.00,2264.00),('DOC',5.5,1978.00,2155.00,2578.00,2245.00,3268.00,3444.00,3556.00,3192.00,2412.00),('DOC',6.0,2080.00,2281.00,2720.00,2378.00,3476.00,3641.00,3794.00,3399.00,2560.00),('DOC',6.5,2182.00,2407.00,2862.00,2511.00,3684.00,3838.00,4032.00,3606.00,2708.00),('DOC',7.0,2284.00,2533.00,3004.00,2644.00,3892.00,4035.00,4270.00,3813.00,2856.00),('DOC',7.5,2386.00,2659.00,3146.00,2777.00,4100.00,4232.00,4508.00,4020.00,3004.00),('DOC',8.0,2488.00,2785.00,3288.00,2910.00,4308.00,4429.00,4746.00,4227.00,3152.00),('DOC',8.5,2590.00,2911.00,3430.00,3043.00,4516.00,4626.00,4984.00,4434.00,3300.00),('DOC',9.0,2692.00,3037.00,3572.00,3176.00,4724.00,4823.00,5222.00,4641.00,3448.00),('DOC',9.5,2794.00,3163.00,3714.00,3309.00,4932.00,5020.00,5460.00,4848.00,3596.00),('DOC',10.0,2896.00,3289.00,3856.00,3442.00,5140.00,5217.00,5698.00,5055.00,3744.00),('DOC',10.5,3020.00,3415.00,4044.00,3575.00,5354.00,5385.00,5958.00,5262.00,3892.00),('DOC',11.0,3144.00,3541.00,4232.00,3708.00,5568.00,5553.00,6218.00,5469.00,4040.00),('DOC',11.5,3268.00,3667.00,4420.00,3841.00,5782.00,5721.00,6478.00,5676.00,4188.00),('DOC',12.0,3392.00,3793.00,4608.00,3974.00,5996.00,5889.00,6738.00,5883.00,4336.00),('DOC',12.5,3516.00,3919.00,4796.00,4107.00,6210.00,6057.00,6998.00,6090.00,4484.00),('DOC',13.0,3640.00,4045.00,4984.00,4240.00,6424.00,6225.00,7258.00,6297.00,4632.00),('DOC',13.5,3764.00,4171.00,5172.00,4373.00,6638.00,6393.00,7518.00,6504.00,4780.00),('DOC',14.0,3888.00,4297.00,5360.00,4506.00,6852.00,6561.00,7778.00,6711.00,4928.00),('DOC',14.5,4012.00,4423.00,5548.00,4639.00,7066.00,6729.00,8038.00,6918.00,5076.00),('DOC',15.0,4136.00,4549.00,5736.00,4772.00,7280.00,6897.00,8298.00,7125.00,5224.00),('DOC',15.5,4260.00,4675.00,5924.00,4905.00,7494.00,7065.00,8558.00,7332.00,5372.00),('DOC',16.0,4384.00,4801.00,6112.00,5038.00,7708.00,7233.00,8818.00,7539.00,5520.00),('DOC',16.5,4508.00,4927.00,6300.00,5171.00,7922.00,7401.00,9078.00,7746.00,5668.00),('DOC',17.0,4632.00,5053.00,6488.00,5304.00,8136.00,7569.00,9338.00,7953.00,5816.00),('DOC',17.5,4756.00,5179.00,6676.00,5437.00,8350.00,7737.00,9598.00,8160.00,5964.00),('DOC',18.0,4880.00,5305.00,6864.00,5570.00,8564.00,7905.00,9858.00,8367.00,6112.00),('DOC',18.5,5004.00,5431.00,7052.00,5703.00,8778.00,8073.00,10118.00,8574.00,6260.00),('DOC',19.0,5128.00,5557.00,7240.00,5836.00,8992.00,8241.00,10378.00,8781.00,6408.00),('DOC',19.5,5252.00,5683.00,7428.00,5969.00,9206.00,8409.00,10638.00,8988.00,6556.00),('DOC',20.0,5376.00,5809.00,7616.00,6102.00,9420.00,8577.00,10898.00,9195.00,6704.00),('DOCMUL',30.0,251.00,295.00,360.00,368.00,461.00,405.00,520.00,583.00,264.00),('DOCMUL',50.0,246.00,292.00,360.00,368.00,461.00,405.00,515.00,552.00,246.00),('DOCMUL',70.0,224.00,290.00,348.00,365.00,458.00,387.00,515.00,502.00,223.00),('DOCMUL',100.0,221.00,282.00,340.00,318.00,399.00,385.00,494.00,502.00,206.00),('DOCMUL',9999.0,205.00,282.00,316.00,298.00,368.00,374.00,483.00,476.00,182.00),('NDOC',0.5,768.00,891.00,1071.00,914.00,1096.00,1126.00,1189.00,1121.00,931.00),('NDOC',1.0,905.00,1017.00,1269.00,1047.00,1354.00,1446.00,1551.00,1328.00,1079.00),('NDOC',1.5,1042.00,1143.00,1467.00,1180.00,1612.00,1766.00,1913.00,1535.00,1227.00),('NDOC',2.0,1179.00,1269.00,1665.00,1313.00,1870.00,2086.00,2275.00,1742.00,1375.00),('NDOC',2.5,1316.00,1395.00,1863.00,1446.00,2128.00,2406.00,2637.00,1949.00,1523.00),('NDOC',3.0,1426.00,1521.00,2022.00,1579.00,2338.00,2662.00,2928.00,2156.00,1671.00),('NDOC',3.5,1538.00,1647.00,2126.00,1712.00,2518.00,2809.00,3025.00,2363.00,1819.00),('NDOC',4.0,1650.00,1773.00,2230.00,1845.00,2698.00,2956.00,3122.00,2570.00,1967.00),('NDOC',4.5,1762.00,1899.00,2334.00,1978.00,2878.00,3103.00,3219.00,2777.00,2115.00),('NDOC',5.0,1874.00,2025.00,2438.00,2111.00,3058.00,3250.00,3316.00,2984.00,2263.00),('NDOC',5.5,1976.00,2151.00,2580.00,2244.00,3266.00,3447.00,3554.00,3191.00,2411.00),('NDOC',6.0,2078.00,2277.00,2722.00,2377.00,3474.00,3644.00,3792.00,3398.00,2559.00),('NDOC',6.5,2180.00,2403.00,2864.00,2510.00,3682.00,3841.00,4030.00,3605.00,2707.00),('NDOC',7.0,2282.00,2529.00,3006.00,2643.00,3890.00,4038.00,4268.00,3812.00,2855.00),('NDOC',7.5,2384.00,2655.00,3148.00,2776.00,4098.00,4235.00,4506.00,4019.00,3003.00),('NDOC',8.0,2486.00,2781.00,3290.00,2909.00,4306.00,4432.00,4744.00,4226.00,3151.00),('NDOC',8.5,2588.00,2907.00,3432.00,3042.00,4514.00,4629.00,4982.00,4433.00,3299.00),('NDOC',9.0,2690.00,3033.00,3574.00,3175.00,4722.00,4826.00,5220.00,4640.00,3447.00),('NDOC',9.5,2792.00,3159.00,3716.00,3308.00,4930.00,5023.00,5458.00,4847.00,3595.00),('NDOC',10.0,2894.00,3285.00,3858.00,3441.00,5138.00,5220.00,5696.00,5054.00,3743.00),('NDOC',10.5,3018.00,3411.00,4046.00,3574.00,5352.00,5388.00,5956.00,5261.00,3891.00),('NDOC',11.0,3142.00,3537.00,4234.00,3707.00,5566.00,5556.00,6216.00,5468.00,4039.00),('NDOC',11.5,3266.00,3663.00,4422.00,3840.00,5780.00,5724.00,6476.00,5675.00,4187.00),('NDOC',12.0,3390.00,3789.00,4610.00,3973.00,5994.00,5892.00,6736.00,5882.00,4335.00),('NDOC',12.5,3514.00,3915.00,4798.00,4106.00,6208.00,6060.00,6996.00,6089.00,4483.00),('NDOC',13.0,3638.00,4041.00,4986.00,4239.00,6422.00,6228.00,7256.00,6296.00,4631.00),('NDOC',13.5,3762.00,4167.00,5174.00,4372.00,6636.00,6396.00,7516.00,6503.00,4779.00),('NDOC',14.0,3886.00,4293.00,5362.00,4505.00,6850.00,6564.00,7776.00,6710.00,4927.00),('NDOC',14.5,4010.00,4419.00,5550.00,4638.00,7064.00,6732.00,8036.00,6917.00,5075.00),('NDOC',15.0,4134.00,4545.00,5738.00,4771.00,7278.00,6900.00,8296.00,7124.00,5223.00),('NDOC',15.5,4258.00,4671.00,5926.00,4904.00,7492.00,7068.00,8556.00,7331.00,5371.00),('NDOC',16.0,4382.00,4797.00,6114.00,5037.00,7706.00,7236.00,8816.00,7538.00,5519.00),('NDOC',16.5,4506.00,4923.00,6302.00,5170.00,7920.00,7404.00,9076.00,7745.00,5667.00),('NDOC',17.0,4630.00,5049.00,6490.00,5303.00,8134.00,7572.00,9336.00,7952.00,5815.00),('NDOC',17.5,4754.00,5175.00,6678.00,5436.00,8348.00,7740.00,9596.00,8159.00,5963.00),('NDOC',18.0,4878.00,5301.00,6866.00,5569.00,8562.00,7908.00,9856.00,8366.00,6111.00),('NDOC',18.5,5002.00,5427.00,7054.00,5702.00,8776.00,8076.00,10116.00,8573.00,6259.00),('NDOC',19.0,5126.00,5553.00,7242.00,5835.00,8990.00,8244.00,10376.00,8780.00,6407.00),('NDOC',19.5,5250.00,5679.00,7430.00,5968.00,9204.00,8412.00,10636.00,8987.00,6555.00),('NDOC',20.0,5374.00,5805.00,7618.00,6101.00,9418.00,8580.00,10896.00,9194.00,6703.00),('NDOCMUL',30.0,251.00,199.00,360.00,253.00,461.00,405.00,520.00,276.00,264.00),('NDOCMUL',50.0,246.00,182.00,360.00,241.00,461.00,405.00,515.00,253.00,246.00),('NDOCMUL',70.0,224.00,170.00,348.00,230.00,458.00,387.00,515.00,241.00,223.00),('NDOCMUL',100.0,221.00,153.00,340.00,218.00,399.00,385.00,494.00,230.00,206.00),('NDOCMUL',9999.0,205.00,140.00,316.00,207.00,368.00,374.00,483.00,218.00,182.00);
/*!40000 ALTER TABLE `cs_dhl530760685` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_dhlZones`
--

DROP TABLE IF EXISTS `cs_dhlZones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_dhlZones` (
  `code` varchar(4) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `zone` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='list of zones for dhl courier';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_dhlZones`
--

LOCK TABLES `cs_dhlZones` WRITE;
/*!40000 ALTER TABLE `cs_dhlZones` DISABLE KEYS */;
INSERT INTO `cs_dhlZones` VALUES ('AF','Afghanistan','H'),('AL','Albania','H'),('DZ','Algeria','H'),('AS','American Samoa','H'),('AD','Andorra','G'),('AO','Angola','H'),('AI','Anguilla','H'),('AG','Antigua','H'),('AR','Argentina','H'),('AM','Armenia','H'),('AW','Aruba','H'),('AU','Australia','C'),('AT','Austria','G'),('AZ','Azerbaijan','H'),('BS','Bahamas','H'),('BH','Bahrain','B'),('BD','Bangladesh','A'),('BB','Barbados','H'),('BY','Belarus','G'),('BE','Belgium','D'),('BZ','Belize','H'),('BJ','Benin','H'),('BM','Bermuda','H'),('BT','Bhutan','A'),('BO','Bolivia','H'),('XB','Bonaire','H'),('BA','Bosnia and Herzegovina','H'),('BW','Botswana','H'),('BR','Brazil','H'),('BN','Brunei','C'),('BG','Bulgaria','G'),('BF','Burkina Faso','H'),('BI','Burundi','H'),('KH','Cambodia','C'),('CM','Cameroon','H'),('CA','Canada','E'),('IC','Canary Islands, The','G'),('CV','Cape Verde','H'),('KY','Cayman Islands','H'),('CF','Central African Republic','H'),('TD','Chad','H'),('CL','Chile','H'),('CN','China, People\'s Republic','C'),('CO','Colombia','H'),('KM','Comoros','H'),('CG','Congo','H'),('CD','Congo, The Democratic Republic of','H'),('CK','Cook Islands','H'),('CR','Costa Rica','H'),('CI','Cote d\'Ivoire','H'),('HR','Croatia','H'),('CU','Cuba','H'),('XC','Curacao','H'),('CY','Cyprus','G'),('CZ','Czech Republic, The','G'),('DK','Denmark','D'),('DJ','Djibouti','H'),('DM','Dominica','H'),('DO','Dominican Republic','H'),('TP','East Timor','C'),('EC','Ecuador','H'),('EG','Egypt','H'),('SV','El Salvador','H'),('GQ','Equatorial Guinea','H'),('ER','Eritrea','H'),('EE','Estonia','H'),('ET','Ethiopia','H'),('FK','Falkland Islands','H'),('FO','Faroe Islands','G'),('FJ','Fiji','H'),('FI','Finland','G'),('FR','France','D'),('GF','French Guiana','H'),('GA','Gabon','H'),('GM','Gambia','H'),('GE','Georgia','H'),('DE','Germany','D'),('GH','Ghana','H'),('GI','Gibraltar','G'),('GR','Greece','G'),('GL','Greenland','H'),('GD','Grenada','H'),('GP','Guadeloupe','H'),('GU','Guam','H'),('GT','Guatemala','H'),('GG','Guernsey','G'),('GN','Guinea Republic','H'),('GW','Guinea-Bissau','H'),('GY','Guyana (British)','H'),('HT','Haiti','H'),('HN','Honduras','H'),('HK','Hong Kong','B'),('HU','Hungary','G'),('IS','Iceland','G'),('ID','Indonesia','C'),('IR','Iran, Islamic Republic of','B'),('IE','Ireland, Republic Of','G'),('IL','Israel','G'),('IT','Italy','D'),('JM','Jamaica','H'),('JP','Japan','F'),('JE','Jersey','G'),('JO','Jordan','B'),('KZ','Kazakhstan','H'),('KE','Kenya','H'),('KI','Kiribati','H'),('KP','Korea, D.P.R Of','C'),('KR','Korea, Republic Of','C'),('KW','Kuwait','B'),('KG','Kyrgyzstan','H'),('LA','Lao People\'s Democratic Republic','C'),('LV','Latvia','H'),('LB','Lebanon','B'),('LS','Lesotho','G'),('LR','Liberia','H'),('LY','Libya','H'),('LI','Liechtenstein','D'),('LT','Lithuania','H'),('LU','Luxembourg','D'),('MO','Macau','C'),('MK','Macedonia, Republic of (FYROM)','H'),('MG','Madagascar','H'),('MW','Malawi','H'),('MY','Malaysia','C'),('MV','Maldives','A'),('ML','Mali','H'),('MT','Malta','G'),('MH','Marshall Islands','H'),('MQ','Martinique','H'),('MR','Mauritania','H'),('MU','Mauritius','H'),('MX','Mexico','E'),('MD','Moldova, Republic Of','H'),('MC','Monaco','D'),('MN','Mongolia','C'),('MS','Montserrat','H'),('MA','Morocco','H'),('MZ','Mozambique','H'),('MM','Myanmar','C'),('NA','Namibia','H'),('NR','Nauru, Republic Of','H'),('NP','Nepal','A'),('NL','Netherlands, The','D'),('XN','Nevis','H'),('NC','New Caledonia','H'),('NZ','New Zealand','C'),('NI','Nicaragua','H'),('NE','Niger','H'),('NG','Nigeria','H'),('NU','Niue','H'),('NO','Norway','G'),('OM','Oman','B'),('PK','Pakistan','B'),('PA','Panama','H'),('PG','Papua New Guinea','H'),('PY','Paraguay','H'),('PE','Peru','H'),('PH','Philippines, The','C'),('PL','Poland','G'),('PT','Portugal','G'),('PR','Puerto Rico','H'),('QA','Qatar','B'),('RE','Reunion, Island Of','H'),('RO','Romania','G'),('RU','Russian Federation, The','H'),('RW','Rwanda','H'),('MP','Saipan','H'),('WS','Samoa','H'),('ST','Sao Tome and Principe','H'),('SA','Saudi Arabia','B'),('SN','Senegal','H'),('CS','Serbia & Montenegro','G'),('SC','Seychelles','H'),('SL','Sierra Leone','H'),('SG','Singapore','B'),('SK','Slovakia','H'),('SI','Slovenia','H'),('SB','Solomon Islands','H'),('SO','Somalia','H'),('XS','Somaliland, Rep of (North Somalia)','H'),('ZA','South Africa','G'),('ES','Spain','G'),('LK','Sri Lanka','A'),('XY','St. Barthelemy','H'),('XE','St. Eustatius','H'),('KN','St. Kitts','H'),('LC','St. Lucia','H'),('XM','St. Maarten','H'),('VC','St. Vincent','H'),('SD','Sudan','H'),('SR','Suriname','H'),('SZ','Swaziland','H'),('SE','Sweden','G'),('CH','Switzerland','D'),('SY','Syria','B'),('PF','Tahiti','H'),('TW','Taiwan','C'),('TJ','Tajikistan','H'),('TZ','Tanzania','H'),('TH','Thailand','C'),('TG','Togo','H'),('TO','Tonga','H'),('TT','Trinidad and Tobago','H'),('TN','Tunisia','H'),('TR','Turkey','G'),('TM','Turkmenistan','H'),('TC','Turks and Caicos Islands','H'),('TV','Tuvalu','H'),('UG','Uganda','H'),('UA','Ukraine','H'),('AE','United Arab Emirates','A'),('GB','United Kingdom','D'),('US','United States Of America','E'),('UY','Uruguay','H'),('UZ','Uzbekistan','H'),('VU','Vanuatu','H'),('VE','Venezuela','H'),('VN','Vietnam','C'),('VG','Virgin Islands (British)','H'),('VI','Virgin Islands (US)','H'),('YE','Yemen','B'),('ZM','Zambia','H'),('ZW','Zimbabwe','H');
/*!40000 ALTER TABLE `cs_dhlZones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_settings`
--

DROP TABLE IF EXISTS `cs_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_settings` (
  `serviceName` varchar(16) NOT NULL,
  `preferences` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='courier management module settings';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_settings`
--

LOCK TABLES `cs_settings` WRITE;
/*!40000 ALTER TABLE `cs_settings` DISABLE KEYS */;
INSERT INTO `cs_settings` VALUES ('DHL','{\"dollarValue\":\"50\",\"euroValue\":\"63\",\"fuelSurcharge\":\"27\",\"misc\":\"40\",\"clearanceCost\":\"1900\",\"handlingCharges_USD\":\"75\",\"minBilling_USD\":\"95\",\"handlingCharges_EUR\":\"60\",\"minBilling_EUR\":\"71\"}');
/*!40000 ALTER TABLE `cs_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_clients`
--

DROP TABLE IF EXISTS `in_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `person` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_clients`
--

LOCK TABLES `in_clients` WRITE;
/*!40000 ALTER TABLE `in_clients` DISABLE KEYS */;
INSERT INTO `in_clients` VALUES (1,'Embarc Information Technology','Shailendra Bansal','shailendra.bansal@findnsecure.com');
/*!40000 ALTER TABLE `in_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_stock`
--

DROP TABLE IF EXISTS `in_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imei` varchar(32) NOT NULL,
  `serial` varchar(32) NOT NULL,
  `model` varchar(8) NOT NULL,
  `dateOfPurchase` date NOT NULL,
  `in_invoice` varchar(32) NOT NULL,
  `in_username` varchar(128) NOT NULL,
  `dateOfSale` date DEFAULT NULL,
  `clientID` int(8) DEFAULT NULL,
  `out_invoice` varchar(32) NOT NULL,
  `out_warranty` int(8) NOT NULL,
  `out_username` varchar(128) NOT NULL,
  `inStock` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='complete stock in/out';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_stock`
--

LOCK TABLES `in_stock` WRITE;
/*!40000 ALTER TABLE `in_stock` DISABLE KEYS */;
INSERT INTO `in_stock` VALUES (1,'2000000001','2000000001','VT-60','2013-09-16','1','tushar','2013-09-16',1,'23423',12,'tushar',1),(2,'2000000002','2000000001','VT-60','2013-09-16','1','tushar','2013-09-16',1,'23423',12,'tushar',1),(3,'2000000003','2000000001','VT-60','2013-09-16','1','tushar','2013-09-16',1,'23423',12,'tushar',1),(4,'2000000004','2000000004','VT-60','2013-09-16','1','tushar','2013-09-16',1,'23423',12,'tushar',1),(5,'2000000005','2000000005','VT-60','2013-09-16','','tushar','2013-09-16',1,'',12,'tushar',1),(6,'2000000006','2000000006','VT-60','2013-09-16','','tushar','2013-09-16',1,'',12,'tushar',1),(7,'2000000007','2000000007','VT-60','2013-09-16','','tushar','2013-09-16',1,'',12,'tushar',1),(8,'2000000008','2000000008','VT-60','2013-09-16','','tushar','2013-09-16',1,'',12,'tushar',1),(9,'5645','15165','VT-60','2013-09-16','','tushar','2013-10-05',1,'',12,'tushar',1),(10,'654156','6546541','VT-60','2013-09-16','','tushar','2013-10-05',1,'',12,'tushar',1),(11,'3','514561','VT-60','2013-09-16','','tushar','2013-09-16',1,'',12,'tushar',1),(12,'651','5641561','VT-60','2013-09-16','','tushar','2013-10-05',1,'',12,'tushar',1),(13,'651466513','51','VT-60','2013-09-16','','tushar','2013-10-12',1,'',12,'tushar',0),(14,'561651','1651651','VT-60','2013-09-16','','tushar','2013-10-10',1,'',12,'tushar',0),(15,'456456','45645','VT-62','2013-07-08','','tushar','2013-07-08',1,'',1,'tushar',0),(17,'45687658765','456456','VT-62','2013-10-08','','tushar','2013-10-08',1,'',15,'tushar',0),(18,'2567865','45465','VT-62','2013-10-08','','tushar','2013-10-08',1,'',15,'tushar',0),(21,'6784536345756','678567','VT-62','2013-10-11','','tushar',NULL,NULL,'',0,'',1),(22,'234324324354','434254325435','VT-62','2013-10-12','','tushar',NULL,NULL,'',0,'',1);
/*!40000 ALTER TABLE `in_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_trackers`
--

DROP TABLE IF EXISTS `in_trackers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_trackers` (
  `model` varchar(8) NOT NULL,
  `vendorName` varchar(32) NOT NULL,
  `vendorModel` varchar(32) NOT NULL,
  `warranty` int(8) DEFAULT '12',
  PRIMARY KEY (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='list of available trackers';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_trackers`
--

LOCK TABLES `in_trackers` WRITE;
/*!40000 ALTER TABLE `in_trackers` DISABLE KEYS */;
INSERT INTO `in_trackers` VALUES ('FS-64','System & Technology Corp.','A1',12),('PT-51','Queclink','GT-500',18),('VT-20','Wonde Proud','VT-200',12),('VT-60','Teltonika','FM-1100',12),('VT-62','Teltonika','FM-1200',12),('VT-70','Teltonika','FM-4200',12),('VT-80','Teltonika','FM-5300',12);
/*!40000 ALTER TABLE `in_trackers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL,
  `image` varchar(64) NOT NULL COMMENT 'image icon of module',
  `href` varchar(128) NOT NULL COMMENT 'linked page of module',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='list of modules';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Courier Cost Calculator','Quickly calculate cost of courier packages','courier.png','courier/courier_dhl.php'),(2,'Inventory Manager','Track Stock-In and Stock-Out','inventory.png','inventory/stock_in.php'),(3,'Settings','Manage embarc-utils','settings.png',''),(4,'Server Maintenance','Check status of servers and schedule maintenance','servers.png','servers/server_list.php');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferences` (
  `username` varchar(128) CHARACTER SET utf8 NOT NULL,
  `module` tinyint(4) NOT NULL,
  `preference` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
INSERT INTO `preferences` VALUES ('tushar',2,'{\"waitTimeIN\":\"3\",\"autoSaveIN\":\"1\",\"out_warranty\":\"12\",\"waitTimeOUT\":\"3\",\"autoSaveOUT\":\"1\",\"model\":\"VT-62\"}'),('tushar',4,'{\"rInt\":\"2\",\"showDel\":\"1\",\"cSort\":\"1\",\"noKey\":\"1\",\"noStatus\":\"0\",\"sw_version\":\"\",\"port\":\"\",\"user2_username\":\"\",\"user2_password\":\"\",\"hosted_at\":\"\"}');
/*!40000 ALTER TABLE `preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm_servers`
--

DROP TABLE IF EXISTS `sm_servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm_servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(128) NOT NULL,
  `contact` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `country` varchar(8) NOT NULL,
  `sw_version` varchar(8) NOT NULL,
  `root_password` varchar(64) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `port` int(8) NOT NULL,
  `url` varchar(128) NOT NULL,
  `hosted_at` int(4) NOT NULL,
  `server_name` varchar(32) NOT NULL,
  `user2_username` varchar(32) NOT NULL,
  `user2_password` varchar(64) NOT NULL,
  `removedBy` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm_servers`
--

LOCK TABLES `sm_servers` WRITE;
/*!40000 ALTER TABLE `sm_servers` DISABLE KEYS */;
INSERT INTO `sm_servers` VALUES (1,'Embarc Information Technology Pvt. Ltd.','Shailendra Bansal','shailendra.bansal@findnsecure.com','+91-9897041111','IN','4.1.2','U2FsdGVkX1/1jUv8ApvUt2V4A+UciGdugOBGVvOA6SNiDDsxO3Sz4npesKAixjr0','71.19.240.175',21000,'trackv4.findnsecure.com',1,'ESS004391','user2','fsdfklj345#$',NULL),(2,'Embarc Information Technology','Shailendra Bansal','shailendra.bansal@findnsecure.com','','IN','4.1.2','U2FsdGVkX19RMC2tTHGfl00ccm4atyd0tTI0Oq6Z0v1BFjmdhe4ICsNP0hOdcYX5','74.3.161.86',21000,'track.findnsecure.com',1,'','','',NULL),(3,'Djibtrack','Mohamed Hassan','mohamedhassan01@gmail.com','','DJ','4.1.2','U2FsdGVkX1+pPHraYaXwyqHKUL1vEf96paXg3koCbs8=','71.19.243.225',21000,'track.djibtrack.com',1,'ESS004752','','',NULL),(4,'Fusion','JosÃ© D\'Amico Barbato ','jose.damico@celsouth.cl','','CL','4.1.2','U2FsdGVkX1/DfZljatu0uSYUODKK5YCie8Ks7tjtivA=','71.19.240.245',21000,'track.fusiongps.cl',1,'ESS004171','','',NULL),(5,'MCM Electronics','James Neville ','james@mcmelectronics.com.au','','AU','4.1.2','U2FsdGVkX1/Kfdl8kT/V8b/o0AsnaBnzikPfg9jFDCgT4EtPe4rpd8EE6GTxAlsK','209.17.190.55',21000,'mcm.findnsecure.com',1,'ESS003861','','',NULL),(6,'MTC','Biju','joshua@mtc-me.com','','OM','4.1.2','U2FsdGVkX19bAINb3+2xqOU0qvpkY1j2CFWzu2m3fQc=','216.18.20.220',21000,'trackmeon.com',1,'ESS000591','','',NULL),(7,'Wataniya','Rifau','rifau.ibrahim@wataniya.mv','','MV','4.1.2','U2FsdGVkX1/BJJV4cb5Qs8RZ+yOOsGM9IEB8LoTLN7M=','216.18.22.159',21000,'track.wataniya.mv',1,'ESS000924','','',NULL),(8,'Vyantra','Anil Anand','anil.anand@gmail.com','','IN','4.1.2','U2FsdGVkX18VkIqJOp1dI7E8tqeddhb/rQXWFyj+wc2s5iQJ0V6duH9uN3rqheqt','74.3.161.196',21000,'vyantra.findnsecure.com',1,'ESS000206','','',NULL),(9,'Asif Electricals','Aadil Patel','aadil.s.patel@gmail.com','','ZM','4.1.2','U2FsdGVkX1/junlQ1ayF6Zd+jIBwJmdQOydIXoFDZ5X3ouMN+lN0makJliyUq+FN','71.19.242.96',21000,'asif.findnsecure.com',1,'ESS004550','','',NULL),(10,'Vivency','Reddy','reddy@vivencyglobal.com','','AE','4.1.2','U2FsdGVkX1+GtrmXVV09WcNCFjX4P7wby49EAawWu8FTKX4B3eM9JjRWy9X0aPlo','71.19.255.6',21000,'tracer.vivencyglobal.com',1,'ESS004392','','',NULL),(11,'Algeofleet','Ali Meghalet ','a.meghalet@algeofleet.com','','DZ','4.1.2','U2FsdGVkX1+c2/0TP8LRXuziG1Rx8cPfq9qen3yyti8=','196.41.225.106',21000,'localiser.algeofleet.com',2,'','','',NULL),(12,'Vinayak Gps','Vinayak V2','arjunjadeja@vinayakgps.net','','IN','4.1.2','U2FsdGVkX1+T5i5/PQzEyB12wIIU9YgUTsv96+ss6Z/dPek0HHgHRY93A21kQrdY','216.18.20.122',21000,'tracking4.vinayakgps.net',1,'ESS000852','','',NULL),(13,'Varuna','Anil','shiv.tiwari@vyantra.net','','IN','4.1.2','U2FsdGVkX18963OnRyQlNRoQVGrph1Q1QGIyVt2RwP4=','74.3.162.4',21000,'varuna.findnsecure.com',1,'ESS000217','','',NULL),(14,'Adata','Navin Kumar Jha','navinj@adatagroup.com','','NG','4.1.2','U2FsdGVkX19Mv3QCkaKv2xTdeX3KVQm21SDBrJTLJz0=','71.19.244.102',21000,'adata.findnsecure.com',1,'ESS004780','','',NULL),(15,'Reflex','Funso Odugbemi','f.odugbemi@gmail.com','','NG','4.1.2','U2FsdGVkX1+4oDPZakreZQCRYUnXv7vreV+y+LPeqIbWumCDRHPx6AJVDz7kA2J0','69.60.119.19',21000,'track.reflextrack.com',2,'','','',NULL),(16,'Offshore','Francisa Emanuel','ocmtracking@gmail.com ','','DM','4.1.2','U2FsdGVkX19R6NZUl2vUvzoYrICYNwxIIDLTs/9ET6QiISZOBVCG7FdGjW3EAyHi','74.3.165.46',21000,'offshore.findnsecure.com',1,'ESS000888','','',NULL),(17,'Maliatec','Peter Chalhoub','PeterChalhoub@maliagroup.com','','LB','4.2.8','U2FsdGVkX19oZeYbFDBjPxMEmZHRrt22uG8Qb+Ig9aA=','209.17.191.12',21000,'maliatec.findnsecure.com',1,'ESS000590','','',NULL),(18,'AMI Group','Gary','gary.stockton@amigroup.co.uk','','GB','4.1.2','U2FsdGVkX18cfXQ7kg5Gwdmks8QkMtag0zpunqxamWo=','71.19.246.14',21000,'login.track4all.co.uk',1,'','','',NULL),(19,'Cgulfc','Rahul','raman@cgulfc.com','','QA','4.1.2','U2FsdGVkX18WZjdzHnaegf/Z6v4kDvTtrQULxPEM+4laMxwHcC05wQrJvNIABgjs','71.19.240.15',21000,'www.avls.cgulfc.com',1,'ESS004332','','',NULL),(20,'Crashboxx','Peter F Byrne','Peter@crashboxx.com','','US','4.1.2','U2FsdGVkX18+PgZ7J2VX7ZnpfSzcLFaSQq+fiWw5d+0=','71.19.242.120',21000,'mycanvasback.com',1,'ESS004229','','',NULL),(21,'Dimatur','Helder Alonso','helderalonso@dimatur.pt','','PT','4.1.2','U2FsdGVkX1/lahZ8sj8de5W7+Mgc5UkOW5EorTOjsoQ=','213.228.191.26',21000,'www.geontag.com ',2,'','','',NULL),(22,'Eldom','Ilias Gouroyiannis','tech_support@eldom.gr','','GR','4.1.2','U2FsdGVkX18H3ItT9M9R7077/2RL8SA/knJEgj0InB8=','62.103.24.67',21000,'track.eldom.gr',2,'','','',NULL),(23,'Eurotracker','Chris Clement','mail@eurotracker.dk','','DK','4.1.2','U2FsdGVkX18B3rkhvL/V2kv+bc8uT7Kru1IfBBI1qn4=','81.7.150.18',21000,'track.eurotracker.dk',2,'','','',NULL),(24,'Eyetracking','Stafford Francis','tstaff@cwjamaica.com','','JM','4.1.2','U2FsdGVkX18R1rFi6IdrdhDjDkIOBuim8bop0ya+vrp0S7HdXLYpUqFKzBZ6jcGV','71.19.246.11',21000,'eyetracking.findnsecure.com',1,'ESS004579','','',NULL),(25,'Infocast','Whalid Fawzy','w.fawzy@infocast-me.com','','EG','4.1.2','U2FsdGVkX1+Qa8wwmblB/4wwqSESbAJdMIr2c9mYHe0=','71.19.246.100',21000,'infocast.findnsecure.com',1,'','','',NULL),(26,'Techtrak','Nader H. al-asmi','nader@tketk.com;m8085@hotmail.com','','SA','4.1.2','U2FsdGVkX19x7jcO3E0wEkHnCKqQ1CkxIoxl5DG4mDs=','71.19.246.19',21000,'satlr.com',1,'','','',NULL),(27,'Segara Jaya','Indra gulo','indragulo@gmail.com','','ID','4.1.2','U2FsdGVkX1/zhbYZiBCiw9dR5+zXCfcyQMubRCFLgRWr2Y18dXGBGHoon2tcy0P3','71.19.246.85',21000,'gps.findnsecure.com',1,'ess004977','','',NULL),(28,'Smarttrac','Jeslin','','','ZA','3.0','U2FsdGVkX1/SIExRmOu2HiLLTClOHjbiEsXYjtEChNHMK7sD69HtL2uVTZQS8xBu','41.76.212.162',21000,'http://track.smarttrac.co.za/',2,'','','',NULL),(29,'Slimm Systems','Ewout','','','NL','3.0','U2FsdGVkX19neva66/AxYk6QhL00mGRl9IAEi+o0Fr4=','95.211.64.17',21000,'www.slimmpro.nl',2,'','','',NULL);
/*!40000 ALTER TABLE `sm_servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `modules` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('abhishek','abhishek123','2'),('anshul','anshul123','4'),('embarc','embarc123#','1'),('manish','manish123','4'),('pritpal','pritpal123','2,4'),('tushar','123','1,2,4');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-08  4:48:48
