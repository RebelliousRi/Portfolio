Program BarbadosToUS;

{This program develops a table that converts Barbados currency to US currency}
{Created by : Arianna St.John}
{Date : 11/29/2022}

Var
  B, U : Real;
Begin
  Writeln ('Barbados', '    US');
  B := 20;
  While B <= 200 
  Do
  Begin
    U := B / 2;
    Writeln (B : 0 : 2, '       ', U : 0 : 2);
    B := B + 5;
  End;
End.