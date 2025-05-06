
# 🦁 Zoo Synonym Matching Game

Bu proje, çocuklar için eğlenceli ve öğretici bir **"eş anlamlı eşleştirme" oyunudur**.  
Oyuncu, verilen hayvan adları ile eş anlamlılarını eşleştirir. Sorular **tek tek** gösterilir ve sonunda puanı öğrenir.  
Mobil uyumludur ve şık bir tasarıma sahiptir.

##  Özellikler

- **Dinamik veritabanı bağlantısı**: Veriler doğrudan MySQL veritabanından alınır.
- **Tek tek sorular**: Sorular birer birer gösterilir, böylece oyuncu her soruya odaklanabilir.
- **Modern ve kullanıcı dostu tasarım**: Minimalist ve şık tasarım ile kullanıcı deneyimi ön planda tutulmuştur.
- **Mobil uyumluluk**: Tasarım tamamen mobil uyumlu olacak şekilde optimize edilmiştir.
- **Sonuç ekranı**: Oyuncu doğru ve yanlış cevapları görebilir, toplam puanını öğrenebilir.

##  Proje Dosya Yapısı

```

/
├── db.php
├── index.php
├── check.php
├── style.css
└── README.md

````

- **`db.php`**: Veritabanı bağlantısı için kullanılan PHP dosyası.
- **`index.php`**: Oyunun başlatıldığı ana sayfa.
- **`check.php`**: Oyuncunun cevaplarını kontrol eden ve sonuçları gösteren sayfa.
- **`style.css`**: Projenin stil dosyası (CSS).

##  Kurulum ve Çalıştırma

1. **Veritabanını oluştur**  
Bir `words` tablosu oluşturup veri ekleyin:

```sql
CREATE TABLE words (
    id INT AUTO_INCREMENT PRIMARY KEY,
    word VARCHAR(255) NOT NULL,
    synonym VARCHAR(255) NOT NULL
);

INSERT INTO words (word, synonym) VALUES
('Lion', 'Big Cat'),
('Elephant', 'Giant Mammal'),
('Monkey', 'Primate'),
('Snake', 'Serpent');
````

2. **Veritabanı bağlantısını düzenle (`db.php`)**

Veritabanı bağlantı bilgilerini **`db.php`** dosyasına aşağıdaki gibi girin:

```php
<?php
$host = 'localhost';
$db   = 'veritabani_adi';  // Burada veritabanı ismini girin
$user = 'kullanici_adi';   // Burada veritabanı kullanıcı ismini girin
$pass = 'sifre';           // Burada veritabanı şifresini girin
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
?>
```

3. **Projeyi çalıştır**
   Projeyi çalıştırmak için **PHP sunucusu** üzerinde `index.php` dosyasını çalıştırabilirsiniz.
   Tarayıcınızda **`index.php`** dosyasını açın ve oyunu oynayın.

##  Kullanım

1. Sayfa açıldığında, her bir hayvan adıyla eş anlamlısını eşleştirmek için bir **dropdown** menüsü sunulur.
2. Cevaplarınızı seçip, **Next** butonuna basarak bir sonraki soruya geçebilirsiniz.
3. Son soruya ulaştığınızda, **Check Answers** butonuna basarak doğru ve yanlış cevaplarınızı ve toplam puanınızı görebilirsiniz.

## 🔧 Görsel Örnekler

### Ana Sayfa (Sorular)

![image](https://github.com/user-attachments/assets/4e64f98e-8b58-4378-bc27-dbe349ef35f9)


**Görsel 1**: Ana sayfa - Tek tek sorular gelir.

### Sonuç Ekranı

![image](https://github.com/user-attachments/assets/7da96c2b-4aed-446e-b6ec-0be2887996a1)


**Görsel 2**: Sonuç ekranı - Puanınızı ve doğru/yanlış cevaplarınızı görüyorsunuz.

##  Mobil Görünüm

Proje tamamen mobil uyumludur. Bu sayede her ekran boyutunda rahatça oynanabilir.

![image](https://github.com/user-attachments/assets/6c2e7533-c513-4806-be91-31cd77ff74c2)

**Görsel 3**: Mobil görünüm - Tasarım her cihazda uyumlu çalışacak şekilde optimize edilmiştir.

##  Geliştirici Bilgisi

Bu proje, çocuklara kelime bilgisi kazandırmayı eğlenceli hale getirmek amacıyla geliştirilmiştir.
Frontend (HTML, CSS, JS) ve Backend (PHP, MySQL) geliştirmeleri yapılmıştır.

* **Frontend**: HTML, CSS (responsive tasarım), JavaScript (soru geçişi ve animasyonlar)
* **Backend**: PHP, MySQL (Veri tabanı bağlantısı ve iş mantığı)

##  Lisans

Bu proje, **MIT Lisansı** altında lisanslanmıştır.

---


