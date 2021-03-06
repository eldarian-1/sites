DROP VIEW Phones;
DROP VIEW Changes;
DROP VIEW Updates;

CREATE VIEW Phones (FirstName, LastName, PhoneNumber)
AS SELECT FirstName, LastName, PhoneNumber
FROM Lab2;

CREATE VIEW Changes (IdEmployee, OperationType, Description, OperationDate)
AS SELECT IdEmployee, TypeOperation, Description, OperationDate
FROM Log;

CREATE VIEW Updates (IdEmployee, Count)
AS SELECT IdEmployee, COUNT(IdEmployee)
FROM Changes
GROUP BY IdEmployee;