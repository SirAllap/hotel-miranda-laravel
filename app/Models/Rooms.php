<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'room';

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public static function all_rooms_availability($check_in, $check_out)
    {
        return Rooms
            ::select('room.*', 'photo.URL')
            ->join('photo', 'room.id', '=', 'photo.room_id')
            ->where('room.status', true)
            ->where('room.discount', 0)
            ->whereNotExists(
                function ($query) use ($check_in, $check_out) {
                    $query->select(DB::raw(1))
                        ->from('booking as b')
                        ->whereColumn('room.id', '=', 'b.room_id')
                        ->where(
                            function ($subquery) use ($check_in, $check_out) {
                                $subquery->whereBetween('b.check_in', [$check_in, $check_out])
                                    ->orWhereBetween('b.check_out', [$check_in, $check_out]);
                            }
                        );
                }
            )
            ->get();
    }

    public static function single_room_availability($id, $check_in, $check_out)
    {
        return Rooms
            ::select('room.*', 'photo.URL', DB::raw("GROUP_CONCAT(a.amenities SEPARATOR ', ') AS all_amenities"))
            ->join('photo', 'room.id', '=', 'photo.room_id')
            ->join('amenities_has_room as ahr', 'room.id', '=', 'ahr.room_id')
            ->join('amenity as a', 'ahr.amenity_id', '=', 'a.id')
            ->where('room.id', '=', $id)
            ->whereNotExists(
                function ($query) use ($check_in, $check_out) {
                    $query->select(DB::raw(1))
                        ->from('booking as b')
                        ->whereColumn('room.id', '=', 'b.room_id')
                        ->where(
                            function ($subquery) use ($check_in, $check_out) {
                                $subquery->whereBetween('b.check_in', [$check_in, $check_out])
                                    ->orWhereBetween('b.check_out', [$check_in, $check_out]);
                            }
                        );
                }
            )
            ->groupBy('room.id', 'photo.URL')
            ->first();
    }
}
