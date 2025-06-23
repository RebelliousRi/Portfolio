Program MilesToKm;

{This program develops a table that converts miles to km}
{Created by : Arianna St.John}
{Date : 11/29/2022}

Var
  M : Integer;
  K : Real;
Begin
  Writeln ('Miles', '   Kilometres');
  For M := 1 to 25 
  Do
  Begin
    K := M * 1.61;
    Writeln (M, '       ', K : 0 : 2);
  End;
End.