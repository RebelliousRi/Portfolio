Program CentigradeToFahrenheit;

{This program develops a table that converts centigrade to fahrenheit}
{Created by : Arianna St.John}
{Date : 11/29/2022}

Var
  C : Integer;
  F : Real;
Begin
  Writeln ('Centigrade', '   Fahrenheit');
  For C := 10 to 50 
  Do
  Begin
    F := 32 + (9 * C) / 5;
    Writeln (C, '           ', F : 0 : 2);
  End;
End.