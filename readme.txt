Cum functioneaza?

Avem o baza de date mysql(momentan este una temporara de pe freemysqlhosting.net) cu datele
de conectare(astea trebuiesc modificate in toate fisierele in functie de ce baza de date folosim):
Host:sql4.freemysqlhosting.net
User:sql497962
Parola:Pp5cX8wHuX
Baza de date:sql497962

In aceasta baza de date avem un tabel(participanti) cu doua campuri(nume si mail).

Pagina formularasmi.html reprezinta un formular care preia datele introduse de utilizatori si le trimite la pagina asmisend.php.Daca mailul se gaseste deja in tabelul participanti din baza de date atunci solicitarea este refuzata si se afiseaza un mesaj corespunzator.In caz contrar se adauga in baza de date numele si mailul introduse.

Pentru a trimite mailurile trebuie accesata pagina run.php iar aceasta va asocia automat persoanele din tabelul participanti si va trimite mailurile.

BONUS:Scriptul salveaza in fisierul testfile.txt combinatiile cu participantii(in cazul in care la finalizarea proiectului dorim sa vedem cum au fost asociati si daca totul a mers cum trebuie)

Cum instalez?

Upload la toate fisierele mai putin fisierul run.php(acest fisier il uploadezi doar cand vrei sa trimiti mailurile iar dupa il stergi pentru a avea siguranta ca pagina nu va mai fi accesata din nou).Modificat datele in functie de baza de date folosita in toate fisierele.Accesat pagina setup.php pentru a creea tabelul.


UPDATE:
Testat deja pe 2 cazuri reale, odata 75 de persoane(AS-MI) si odata 10(Grupa 233) de ambele dati cu succes si laude :D