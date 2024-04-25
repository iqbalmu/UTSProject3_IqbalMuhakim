# Dokter API Spec

## List Dokter

Endpoint : GET /api/antrian

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": [
        {
            "nama": "Dr. jhon",
            "email": "sample@mail.com",
            "nomor_hp": "082196506900",
            "foto": "www.dokter-images.com/path/to/photo.jpg",
            "nomor_str": "123132123123",
            "nomor_sip": "123132123123",
            "spesialisasi": "bedah otak",
            "poli": {
                "id": 2,
                "nama": "bedah"
            }
        },
        {
            "nama": "Dr. doe",
            "email": "sample@mail.com",
            "nomor_hp": "082196506900",
            "foto": "www.dokter-images.com/path/to/photo.jpg",
            "nomor_str": "123132123122",
            "nomor_sip": "123132123444",
            "spesialisasi": "umum",
            "poli": {
                "id": 1,
                "nama": "umum"
            }
        }
    ]
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```
