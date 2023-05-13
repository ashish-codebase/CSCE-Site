CREATE TABLE `users` (
  `Email` varchar(100) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `LName` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`Email`, `FName`, `LName`, `Phone`, `Password`) VALUES
('a@hotmail.org', 'Benedict Lucas', 'Lee Hampton', '1-724-515-7683', '123'),
('adfadsf@afafdf.com', '', 'aferwr', '12569875469', '123'),
('amasih2@huskers.unl.edu', '', 'Masih', '987654321012', '123'),
('eget.mollis.lectus@hotmail.ca', 'Denton Bowman', 'Rigel Simpson', '(437) 817-8754', '123'),
('fusce.mi@outlook.org', 'Sophia Rush', 'Quon Waller', '(372) 884-6296', '123'),
('google_woogle@google.com', '456', '7879', '123564789132', '123'),
('maecenas.iaculis.aliquet@aol.org', 'Eric Jacobs', 'Aurelia Yang', '1-885-268-3271', '123'),
('masih.ashish@gmail.com', '46456', '456456', '45645645645', '123'),
('masih.ashish@gmial.com', 'Ashish', 'Maish', '789456123000', '123'),
('vestibulum.ante@aol.edu', 'Edward Bass', 'Sebastian Morales', '1-421-535-6362', '123'),
('zeus@zion.com', 'zeus', 'Zion', '7532878456', '123');
