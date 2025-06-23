Program Wanderlust_Invoice;

{This program prompts the user to input the client’s last name, the tour booked by the client, the tour date, the number of people in their touring party as well as the new tour price of the tour booked by the client. It calculates the excursion price of the tour. A 10% discount is given to parties with 5 or more people and outputs “Group Special”. For parties with less than 5 people it outputs “Regular Price”. For all bookings it outputs an invoice which includes the client’s last name, the tour booked by the client, the tour date, and the number of people in their touring party as well as the total price for the booking along with the specified message}
{Created by Arianna St.John}
{Date: 06/03/2023}

Var

LastName,Tour, TourDate:String; {Variables storing the client’s last name, the tour booked by the client and the tour date}
Entries, GroupSize:Integer; {Variables storing the loop variable which allows the loop to increment and the booking entries and the number of people in the client’s touring party}
NewTourPrice,ExcursionPrice,TotalPrice:Real; {Variables storing the new tour price of the tour booked by the client, the excursion price of the tour and total price to be paid}

Begin

Entries:=1; {Initialisation of the variable to 1}

Writeln('________________________________________________________________________________________________________________________');
Writeln('________________________________________________________________________________________________________________________');
Writeln;

Repeat

   Write('Enter the last name of the client '); {Prompts the user to input the client’s last name}
   Readln(LastName); {Stores the client’s last name}
   Writeln;
   Write('Enter the tour booked by the client '); {Prompts the user to input the tour booked by the client}
   Readln(Tour); {Stores the tour booked by the client}
   Writeln;
   Write('Enter the tour date '); {Prompts the user to input the tour date}
   Readln(TourDate); {Stores the tour date}
   Writeln;
   Write('Enter the number of people in the touring party of the client '); {Prompts the user to input the number of people in the touring party of the client}
   Readln(GroupSize); {Stores the number of people in the touring party of the client}
   Writeln;
   Write('Enter the new tour price of the tour $'); {Prompts the user to input the new tour price of the tour}
   Readln(NewTourPrice); {Stores the new tour price of the tour}

   Writeln('________________________________________________________________________________________________________________________');
   Writeln('________________________________________________________________________________________________________________________');

   
   Writeln;
   Writeln('Date: 06/03/2023'); {Outputs the date of the invoice}
   Writeln;
   Writeln('Thank you for booking a tour with Island Wanderlust.'); {Outputs a message thanking the client}
   Writeln;
   Writeln('Below is your personal information as well as the total amount to be paid for the tour.'); {Outputs a message indicating that the client's information is below}
   Writeln;
   Writeln('------------------------------------------------------------------------------------------------------------------------');
   Writeln;

   ExcursionPrice:=NewTourPrice*GroupSize; {Calculates the excursion price for the touring party}
   
   If GroupSize>=5 Then {Determines whether or not the touring party has 5 or more people and gives them a 10% discount if they do,calculates the total price for the customer}
   
      Begin
         TotalPrice:=ExcursionPrice-(ExcursionPrice*0.10); {Calculates the total price to be paid for a touring party with 5 or more people}
         Writeln('Group Special'); {Outputs a message indicating that the touring party has 5 or more people}
      End
   Else
      Begin
         TotalPrice:=ExcursionPrice; {Calculates the total price to be paid for a touring party with less than 5 people}
         Writeln('Regular Price'); {Outputs a message indicating that the touring party has less than 5 people}
      End;
   
   Writeln;
   
   Writeln('The last name of the client is ',LastName); {Outputs the client’s last name}
   Writeln;

   Writeln('The tour booked by the client is ',Tour); {Outputs the tour booked by the client}
   Writeln;

   Writeln('The tour date is ',TourDate); {Outputs the tour date}
   Writeln;

   Writeln('The number of people in the touring party of the client is ',GroupSize); {Outputs the number of people in the touring party of the client}
   Writeln;

   Writeln('The total price to be paid is $',TotalPrice:3:2); {Outputs the total price to be paid}
   Writeln;

   Writeln('________________________________________________________________________________________________________________________');
   Writeln('________________________________________________________________________________________________________________________');
   Writeln;
   Writeln;

   Entries:=Entries+1; {Statement counting the looping variable}
   
Until Entries=6;
End.