// let nama;
// nama = "Chandra Christian";
// console.log(nama);

// const nama = "Chandra";
// nama = "Christian";
// console.log(nama);

// let ipk = 3.9;
// let price = 15000;
// let celcius = -15;

// console.log(ipk, price,celcius);

// let activity

// activity = "Inez sedang pulang ke bogor"
// console.log(activity)

// activity = "Inez sedang sedang mengerjakan PBW"
// console.log(activity)

// activity = "Inez sedang sedang pusing JKS"
// console.log(activity)

// let isSuccessful = true;
// let isFailed = false;

// console.log(isSuccessful);
// console.log(isFailed);

// let fakultas = [
//     "Fakultas Ilmu Komputer",
//     "Fakultas Hukum",
//     "Fakultas Teknik",
//     "Fakultas Sosial dan Ilmu Politik",
//     "Fakultas Agama Islam",
// ];

// fakultas[1]= "Fakultas Ekonomi dan Bisnis";
// console.log(fakultas);

// fakultas[4]= "Lima Puluh";
// console.log(fakultas);

// let coordinate = [
//     [0,3],
//     [6,2],
//     [9,8],
// ];

// console.log(coordinate[0][0]);
// console.log(coordinate[1][1]);
// console.log(coordinate[1][1]);
// console.log(coordinate[2][0]);
// console.log(coordinate[2][0]);
// console.log(coordinate[0][1]);

// let hasil = 9+10;
// console.log(hasil);
// hasil = 9-10;
// console.log(hasil);
// hasil = 9*10;
// console.log(hasil);
// hasil = 9/10;
// console.log(hasil);

// let hargaBuah = 15000;
// let hargaTejus = 10000;

// let total = hargaBuah + hargaTejus;
// console.log(total);
// alert("Total belanjaan anda adalah " + total);

// let results = 18 > 2;
// console.log(results);
// results = 18 > 2;
// console.log(results);
// results = 20 >= 10;
// console.log(results);
// results = 10 <= 20;
// console.log(results);
// results = 0 == 2;
// console.log(results);
// results = 0 === 2;
// console.log(results);

// let bool;
// bool = true && false; 
// console.log(bool);
// bool = false || true; 
// console.log(bool);
// bool = !false; 
// console.log(bool);
// bool = true || true || false; 
// console.log(bool);
// bool = (true && false) || true; 
// console.log(bool);

// let firstName, lastName, fullName;

// firstName = "Chandra";
// lastName = "Christian";
// fullName = firstName + " " +  lastName;

// console.log("Nama anda adalah " + fullName);

// let mahasiswa = ["Chandra", "Christian", "Siregar"]

// console.log(mahasiswa[0] + " dan " + mahasiswa[2]);

// let male = ["Ujang Sanjaya", "Kevin Alam", "Dedi Wijaya"];
// console.log(male);

// let female = ["Lilis Puspitasari", "Ririn Noviyanti", "Putri Wijaya"];
// console.log(female);

// let murid = [...male, ...female];
// console.log(murid);

// let gender;
// gender = "chandra   ";

// if (gender === "male") {
//     console.log("I am male");
// }else{
//     console.log("I am female");
// }

// program to display fibonacci sequence using recursion
// function fibonacci(num) {
//     if(num < 2) {
//         return num;
//     }
//     else {
//         return fibonacci(num-1) + fibonacci(num - 2);
//     }
// }

// // take nth term input from the user
// const nTerms = prompt('Enter the number of terms: ');

// if(nTerms <=0) {
//     console.log('Enter a positive integer.');
// }
// else {
//     for(let i = 0; i < nTerms; i++) {
//         console.log(fibonacci(i));
//     }
// }

// let username, password;

// username = 'admin';
// password = 'm';

// const isSuccessful = true;
// const isFailed = false;

// if (username === 'admin') {
//     if (password === 'admin') {
//         console.log(isSuccessful);
//     } else {
//         console.log(isFailed);
//     }
// }else if (password === 'admin') {
//     console.log(isFailed);
// }else  {
//     console.log(isFailed);
// }

// if (username === 'admin' && password === 'admin') {
//     console.log(isSuccessful);
// }else if (username === 'admin' && password !== 'admin') {
//     console.log(isFailed);
// }
// else if (username !== 'admin' && password === 'admin') {
//     console.log(isFailed);
// }

// let grade = 'Z';

// switch (grade){
//     case 'A':
//         console.log('Verry Good');
//         break;
//     case 'B':
//         console.log('Good');
//         break;
//     case 'C':
//         console.log('Enough');
//         break;
//     case 'D':
//         console.log('Verry Enough');
//         break;
//     default:
//         console.log('No Grade');
//         break;
// }


// let age = prompt('masukkan umur kamu: ');

// let result = (age >= 18) ? " Bisa Untuk Voting " : " Tidak bisa untuk Voting";
// console.log(result);

// function greet() {
//     return('Greeting Morning');
// }
// let regard = greet();
// console.log(regard);
// console.log(greet());

// function hobi{
//     const listHobi = ["Bola ", "Bulu Tangkis ", "Basket ", "Menulis ", "Mancing "];
//     return listHobi;
// }

// let hobby = hobi();
// for (const iterator of hobby) {
//     console.log(iterator);
// }
    
// function tambah(number1, number2) {
//     let result = number1 + number2;
//     return result;
// }
// console.log(tambah(1, 2));

// function average(...index){
//     let sum = index.length;
//     let result = 0;
//     for(const i of index){
//     result += i;
//     }
//     return result/sum;
//     }
//     let x = average(4,8,3,7);
//     console.log(x);

// fungsi untuk mencetak deret fibonacci
// function fibonacci(n) {
//     let sequence = [0, 1];
  
//     for (let i = 2; i <= n; i++) {
//       const a = sequence[i - 1];
//       const b = sequence[i - 2];
//       sequence.push(a + b);
//     }
  
//     return sequence;
//   }
  
//   // mencetak deret fibonacci hingga suku ke-10
//   console.log(fibonacci(10));


// let nama = prompt('masukkan nama anda: ');

// console.log('Selamat datang ' + nama + ' di Kalkulator ini ');

// function tambah(angka1,angka2) {
//         let result = angka1 + angka2;
//         return result;
//     }
//     console.log(tambah(10,10));
// function kurang(angka1,angka2) {
//         let result = angka1 - angka2;
//         return result;
//     }
//     console.log(kurang(10,10));
// function kali(angka1,angka2) {
//         let result = angka1 * angka2;
//         return result;
//     }
//     console.log(kali(10,10));
// function bagi(angka1,angka2) {
//         let result = angka1 / angka2;
//         return result;
//     }
//     console.log(bagi(10,10));
// function persen(angka1,angka2) {
//         let result = angka1 % angka2;
//         return result;
//     }
//     console.log(persen(100,10));