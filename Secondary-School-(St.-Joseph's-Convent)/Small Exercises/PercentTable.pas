Program PercentTable;

{This program develops a table that calculates 3% and 5% of numbers}
{Created by : Arianna St.John}
{Date : 11/29/2022}

Var
  N : Integer;
  Three, Five : Real;
Begin
  Writeln ('Number', '    3%', '     5%');
  N := 100;
  While N <= 500 
  Do
  Begin
    Three := N * 0.03;
    Five := N * 0.05;
    Writeln (N, '       ', Three : 0 : 2, '   ', Five : 0 : 2);
    N := N + 10;
  End;
End.