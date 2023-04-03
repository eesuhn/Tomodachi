-- user table
CREATE TABLE `user` (
    `userID` int(11) NOT NULL,
    `userName` varchar(255) NOT NULL,
    `userEmail` varchar(255) NOT NULL,
    `userPwd` varchar(255) NOT NULL
);

-- currency table 
CREATE TABLE `currency` (
    `currencyID` int(11) NOT NULL,
    `userID` int(11) NOT NULL,
    `currencyNum` int(11) NOT NULL
);

-- food table
CREATE TABLE `food` (
    `foodID` int(11) NOT NULL,
    `foodImg` varchar(255) NOT NULL,
    `foodName` varchar(255) NOT NULL,
    `foodDesc` varchar(255) NOT NULL,
    `foodPrice` int(11) NOT NULL,
    `foodHunger` int(11) NOT NULL,
    `foodXP` int(11) NOT NULL
);

-- food_inventory table
CREATE TABLE `food_inventory` (
    `userID` int(11) NOT NULL,
    `foodID` int(11) NOT NULL,
    `foodNum` int(11) NOT NULL
);

-- Primary key
ALTER TABLE `user`
    ADD PRIMARY KEY (`userID`);

ALTER TABLE `currency`
    ADD PRIMARY KEY (`currencyID`);

ALTER TABLE `food`
    ADD PRIMARY KEY (`foodID`);

-- Auto increment
ALTER TABLE `user`
    MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `currency`
    MODIFY `currencyID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `food`
    MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

-- Foreign key
ALTER TABLE `currency`
    ADD CONSTRAINT `currency_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

ALTER TABLE `food_inventory`
    ADD CONSTRAINT `food_inventory_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

ALTER TABLE `food_inventory`
    ADD CONSTRAINT `food_inventory_ibfk_2` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`);