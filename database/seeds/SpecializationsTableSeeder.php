<?php

use Illuminate\Database\Seeder;
use App\Specialization;
use Illuminate\Support\Str;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'Allergologia ed Immunologia Clinica',
            'Anatomia Patologica',
            'Anestesia e Rianimazione e Terapia Intensiva e del dolore',
            'Audiologia e foniatria',
            'Cardiochirurgia',
            'Chirurgia Generale',
            'Chirurgia Maxillo-Facciale',
            'Chirurgia Pediatrica',
            'Chirurgia Plastica Ricostruttiva ed Estetica',
            'Chirurgia Toracica',
            'Chirurgia Vascolare',
            'Dermatologia e Venereologia',
            'Ematologia',
            'Endocrinologia e Malattie del Metabolismo',
            'Farmacologia e Tossicologia clinica',
            'Fisica Medica',
            'Genetica Medica',
            'Geriatria',
            'Ginecologia ed Ostetricia',
            'Igiene e Medicina Preventiva',
            "Malattie Apparato Cardiovascolare",
            "Malattie Apparato Digerente",
            "Malattie Apparato Respiratorio",
            "Malattie Infettive e Tropicali",
            "Medicina di Emergenza-Urgenza",
            "Medicina del Lavoro",
            "Medicina dello Sport e esercizio fisico",
            "Medicina di Comunità e delle cure primarie",
            "Medicina Fisica e Riabilitativa",
            "Medicina Interna",
            "Medicina Legale",
            "Medicina Nucleare",
            "Medicina Termale",
            "Microbiologia e Virologia",
            "Nefrologia",
            "Neurochirurgia",
            "Neurologia ",
            "Neuropsichiatria infantile",
            "Oftalmologia",
            "Oncologia Medica",
            "Ortopedia e Traumatologia",
            "Otorinolaringoiatria",
            "Patologia clinica e Biochimica clinica",
            "Pediatria",
            "Psichiatria",
            "Radiodiagnostica",
            "Radioterapia",
            "Reumatologia",
            "Statistica Sanitaria e Biometria",
            "Urologia",
        ];

        foreach ($arr as $specialization){
            $new_spec = new Specialization();
            $new_spec->name = $specialization;
            $new_spec->slug = Str::slug($new_spec->name, '-');
            $new_spec->save();
        }
    }
}
