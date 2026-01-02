import {MapContainer, TileLayer, Marker, useMap, useMapEvents} from 'react-leaflet';
import {useState} from 'react';
import "leaflet/dist/leaflet.css";
import {Icon} from "leaflet";
import axios from "axios";
import loc from "../assets/loc.svg";

const customIcon = new Icon({
    iconUrl: loc,
    iconSize: [38, 38]
});

function LocationMarker({position}) {
    return position ? <Marker position={position} icon={customIcon}/> : null;
}

function SetMapCenter({position}) {
    const map = useMap();
    if (position) {
        map.setView(position, map.getZoom());
    }
    return null;
}

export default function MapComp({onChange, mapShow, setMapShow}) {
    const [position, setPosition] = useState(null);
    const [query, setQuery] = useState("");

    // Reverse geocoding function
    const reverseGeocode = async (lat, lng) => {
        try {
            const res = await axios.get(`https://api.opencagedata.com/geocode/v1/json`, {
                params: {
                    q: `${lat},${lng}`,
                    key: import.meta.env.VITE_API_KEY_OPEN_CAGE_DATA,
                    language: 'id'
                }
            });

            if (res.data.results.length > 0) {
                const address = res.data.results[0].formatted;
                setQuery(address);
                onChange?.(address); // Kirim alamat ke parent setelah dapat hasil
            }
        } catch (error) {
            console.error("Reverse geocoding error:", error);
        }
    };

    const handleSearch = async () => {
        if (!query) return;

        try {
            const res = await axios.get(`https://api.opencagedata.com/geocode/v1/json`, {
                params: {
                    q: query,
                    key: import.meta.env.VITE_API_KEY_OPEN_CAGE_DATA,
                    limit: 1,
                    language: 'id'
                }
            });

            if (res.data.results.length > 0) {
                const loc = res.data.results[0];
                const latLng = {
                    lat: loc.geometry.lat,
                    lng: loc.geometry.lng
                };
                setPosition(latLng);
                onChange?.(query); // Kirim query yang udah diketik user
            } else {
                alert("Alamat tidak ditemukan");
            }
        } catch (error) {
            console.error("Geocoding error:", error);
            alert("Gagal mencari alamat");
        }
    };

    function ClickHandler() {
        useMapEvents({
            click(e) {
                setPosition(e.latlng);
                // Trigger reverse geocoding when clicking on map
                // onChange akan dipanggil di dalam reverseGeocode setelah dapat hasil
                reverseGeocode(e.latlng.lat, e.latlng.lng);
            }
        });
        return null;
    }

    return (
        <div className={`bottom-sheet ${mapShow ? 'active' : ''} max-width-1000`}>
            <div className="bottom-sheet-header" onClick={() => setMapShow(false)}>
                🖱
            </div>
            <div className={'bottom-sheet-content card-wrapper replace-shadow-with-border'}>
                <div className={'flex-aic-jcs gap-m'}>
                    <input
                        type="text"
                        value={query}
                        onChange={(e) => setQuery(e.target.value)}
                        placeholder="Cari alamat..."
                        style={{width: "70%", padding: 8}}
                    />
                    <button className={'button bg-primary'} onClick={handleSearch} style={{padding: 8, marginLeft: 4}}>Cari</button>
                </div>

                <MapContainer center={[-6.2088, 106.8456]} // Jakarta coordinates
                              zoom={13}
                              style={{
                                  height: "400px",
                                  width: "100%",
                                  borderRadius: 12,
                                  overflow: 'hidden',
                              }}>
                    <TileLayer
                        attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                    />
                    <ClickHandler/>
                    <SetMapCenter position={position}/>
                    <LocationMarker position={position}/>
                </MapContainer>
            </div>
        </div>
    );
}