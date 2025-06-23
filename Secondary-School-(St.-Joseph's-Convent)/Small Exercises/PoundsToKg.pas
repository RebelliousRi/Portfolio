Program PoundsToKg;

{This program develops a table that converts pounds to kg}
{Created by : Arianna St.John}
{Date : 11/29/2022}

Var
  P, X, K : Real;
Begin
  Writeln ('Enter an ending value');
  Readln (X);
  Writeln ('Pounds', '   Kilograms');
  P := 1;
  While P <= X 
  Do
  Begin
    K := P * 0.45;
    Writeln (P : 0 : 2, '     ', K : 0 : 2);
    P := P + 1;
  End;
End.