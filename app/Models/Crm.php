<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    use HasFactory;

    public static function getCity(){
        $indianMajorCities = [
    // Metro / Tier-1
    "Mumbai", "Delhi", "Bengaluru", "Hyderabad", "Chennai", "Kolkata", "Pune", "Ahmedabad",

    // Tier-2 / Tier-3 Expanding Urban Centers
    "Surat", "Jaipur", "Lucknow", "Kanpur", "Nagpur", "Indore", "Bhopal", "Patna", "Vadodara",
    "Ludhiana", "Agra", "Nashik", "Faridabad", "Meerut", "Rajkot", "Varanasi", "Amritsar",
    "Visakhapatnam", "Ranchi", "Coimbatore", "Guwahati", "Chandigarh", "Thiruvananthapuram",
    "Jodhpur", "Madurai", "Raipur", "Dehradun", "Gwalior", "Noida", "Howrah", "Allahabad",
    "Hubli-Dharwad", "Mysuru", "Vijayawada", "Jabalpur", "Tiruchirappalli", "Bareilly", "Aligarh",
    "Moradabad", "Kochi", "Solapur", "Kollam", "Thrissur", "Jalandhar", "Udaipur", "Ajmer", "Kota",
    "Bhavnagar", "Kolhapur", "Cuttack", "Bilaspur", "Panaji", "Dhanbad", "Bhilai", "Rourkela",
    "Siliguri", "Durgapur", "Asansol", "Nanded", "Nellore", "Belgaum", "Warangal", "Guntur", "Tirupati",
    "Shimla", "Imphal", "Aizawl", "Shillong", "Itanagar", "Agartala", "Puducherry", "Srinagar", "Leh"
];
return $indianMajorCities;
    }
}
