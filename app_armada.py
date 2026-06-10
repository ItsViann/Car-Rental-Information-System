import mysql.connector

# Koneksi ke database Laragon
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="db_rental_kendaraan"
)
cursor = conn.cursor()

def tambah_armada():
    plat = input("Plat Nomor: ")
    merk = input("Merk Mobil: ")
    tahun = input("Tahun Buat: ")
    tarif = input("Tarif per Hari: ")
    
    sql = "INSERT INTO armada (plat_nomor, merk_mobil, tahun_buat, tarif_perhari) VALUES (%s, %s, %s, %s)"
    cursor.execute(sql, (plat, merk, tahun, tarif))
    conn.commit()
    print("Berhasil menambah mobil baru!\n")

def lihat_armada():
    cursor.execute("SELECT * FROM armada")
    for baris in cursor.fetchall():
        print(f"ID: {baris[0]} | Plat: {baris[1]} | Merk: {baris[2]} | Tahun: {baris[3]} | Tarif: {baris[4]} | Status: {baris[5]}")
    print()

while True:
    print("=== KELOLA ARMADA RENTAL ===")
    print("1. Lihat Mobil\n2. Tambah Mobil\n0. Keluar")
    pilihan = input("Pilih (1/2/0): ")
    if pilihan == '1': lihat_armada()
    elif pilihan == '2': tambah_armada()
    elif pilihan == '0': break