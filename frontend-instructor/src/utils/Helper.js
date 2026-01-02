import {useNavigate} from "react-router";

export function getPage(url) {
    const add = new URL(url);
    return add.searchParams.get('page');
}

export function formatNumber(value) {
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(value);
}

export function formatDate(date) {
    const pad = (n) => n.toString().padStart(2, '0');

    const year = date.getFullYear();
    const month = pad(date.getMonth() + 1); // bulan mulai dari 0
    const day = pad(date.getDate());

    const hours = pad(date.getHours());
    const minutes = pad(date.getMinutes());
    const seconds = pad(date.getSeconds());

    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}


export const useCustomNavigate = () => {
    const navigate = useNavigate();

    return (pathWithHash, state = {}) => {
        navigate(pathWithHash, {state});

        // Wait for route change then scroll
        setTimeout(() => {
            const hash = pathWithHash.split('#')[1];
            if (hash) {
                const element = document.getElementById(hash);
                if (element) {
                    element.scrollIntoView({behavior: 'smooth'});
                }
            }
        }, 100);
    };
}

export const dataBanks = {
    "aceh": "PT. BANK ACEH",
    "aceh_syar": "PT. BPD ISTIMEWA ACEH SYARIAH",
    "agris": "PT. BANK AGRIS",
    "agroniaga": "PT. BANK RAKYAT INDONESIA AGRONIAGA TBK.",
    "allo": "PT. ALLO BANK INDONESIA TBK.",
    "amar": "PT. BANK AMAR INDONESIA",
    "andara": "PT. BANK ANDARA",
    "anglomas": "PT. ANGLOMAS INTERNATIONAL BANK",
    "antar_daerah": "PT. BANK ANTAR DAERAH",
    "anz": "PT. BANK ANZ INDONESIA",
    "artajasa": "PT. ARTAJASA",
    "artha": "PT. BANK ARTHA GRAHA INTERNASIONAL TBK.",
    "bali": "PT. BANK PEMBANGUNAN DAERAH BALI",
    "bangkok": "BANGKOK BANK PUBLIC CO.LTD",
    "banten": "PT. BANK BANTEN",
    "barclays": "PT BANK BARCLAYS INDONESIA",
    "bca": "PT. BANK CENTRAL ASIA TBK.",
    "bcad": "PT. BANK DIGITAL BCA",
    "bca_syar": "PT. BANK BCA SYARIAH",
    "bengkulu": "PT. BPD BENGKULU",
    "bisnis": "PT. BANK BISNIS INTERNASIONAL",
    "bjb": "PT. BANK PEMBANGUNAN DAERAH JABAR DAN BANTEN",
    "bjb_syar": "PT. BANK JABAR BANTEN SYARIAH",
    "bni": "PT. BANK NEGARA INDONESIA (PERSERO)",
    "bnp": "PT. BANK NUSANTARA PARAHYANGAN",
    "bnp_paribas": "PT. BANK BNP PARIBAS INDONESIA",
    "boa": "BANK OF AMERICA NA",
    "bri": "PT. BANK RAKYAT INDONESIA (PERSERO)",
    "bsi": "PT. BANK SYARIAH INDONESIA TBK.",
    "btn": "PT. BANK TABUNGAN NEGARA (PERSERO)",
    "btn_syar": "PT. BANK TABUNGAN NEGARA (PERSERO) UNIT USAHA SYARIAH",
    "btpn": "PT. BANK BTPN",
    "btpn_syar": "PT. BANK TABUNGAN PENSIUNAN NASIONAL SYARIAH",
    "bukopin": "PT BANK KB BUKOPIN TBK.",
    "bukopin_syar": "PT. BANK SYARIAH BUKOPIN",
    "bumiputera": "PT. BANK BUMIPUTERA",
    "bumi_artha": "PT. BANK BUMI ARTA",
    "capital": "PT BANK CAPITAL INDONESIA",
    "centratama": "PT. CENTRATAMA NASIONAL BANK",
    "chase": "JP MORGAN CHASE BANK, N.A",
    "china": "BANK OF CHINA",
    "china_cons": "CHINA CONSTRUCTION",
    "chinatrust": "PT. BANK CTBC INDONESIA",
    "cimb": "PT. BANK CIMB NIAGA TBK.",
    "cimb_syar": "PT. BANK CIMB NIAGA TBK. - UNIT USAHA SYARIAH",
    "cimb_rekening_ponsel": "PT. BANK CIMB NIAGA TBK. - REKENING PONSEL",
    "cimb_va": "PT. BANK CIMB NIAGA TBK. - VIRTUAL ACCOUNT",
    "citibank": "CITIBANK, NA",
    "commonwealth": "PT. BANK COMMONWEALTH",
    "danamon": "PT. BANK DANAMON INDONESIA TBK.",
    "danamon_syar": "PT. BANK DANAMON INDONESIA UNIT USAHA SYARIAH",
    "dbs": "PT. BANK DBS INDONESIA",
    "deutsche": "DEUTSCHE BANK AG.",
    "dipo": "PT. BANK DIPO INTERNATIONAL",
    "diy": "PT. BANK PEMBANGUNAN DAERAH DIY",
    "diy_syar": "PT.BANK PEMBANGUNAN DAERAH DIY UNIT USAHA SYARIAH",
    "dki": "PT. BANK DKI",
    "dki_syar": "PT. BANK DKI UNIT USAHA SYARIAH",
    "ekonomi": "PT. BANK EKONOMI RAHARJA",
    "fama": "PT. BANK FAMA INTERNATIONAL",
    "ganesha": "PT. BANK GANESHA",
    "gopay": "GO-PAY",
    "hana": "PT. BANK KEB HANA INDONESIA",
    "hs_1906": "PT. BANK HS 1906",
    "hsbc": "PT. BANK HSBC INDONESIA",
    "icbc": "PT. BANK ICBC INDONESIA",
    "ina_perdana": "PT. BANK INA PERDANA",
    "index_selindo": "BANK INDEX SELINDO",
    "india": "PT. BANK OF INDIA INDONESIA TBK.",
    "jago": "PT. BANK JAGO TBK.",
    "jago_syar": "PT. BANK JAGO UNIT USAHA SYARIAH",
    "jambi": "PT.BANK PEMBANGUNAN DAERAH JAMBI",
    "jasa_jakarta": "PT. BANK JASA JAKARTA",
    "jateng": "PT. BANK PEMBANGUNAN DAERAH JAWA TENGAH",
    "jateng_syar": "PT. BANK PEMBANGUNAN DAERAH JAWA TENGAH",
    "jatim": "PT. BANK PEMBANGUNAN DAERAH JATIM",
    "jatim_syar": "PT.BANK PEMBANGUNAN DAERAH JATIM - UNIT USAHA SYARIAH",
    "jtrust": "PT. BANK JTRUST INDONESIA TBK.",
    "kalbar": "PT.BANK PEMBANGUNAN DAERAH KALBAR",
    "kalbar_syar": "PT.BANK PEMBANGUNAN DAERAH KALBAR UUS",
    "kalsel": "PT. BANK PEMBANGUNAN DAERAH KALSEL",
    "kalsel_syar": "PT. BANK PEMBANGUNAN DAERAH KALSEL - UNIT USAHA SYARIAH",
    "kalteng": "PT. BPD KALIMANTAN TENGAH",
    "kaltim": "PT.BANK PEMBANGUNAN DAERAH KALTIM",
    "kaltim_syar": "PT.BANK PEMBANGUNAN DAERAH KALTIM - UNIT USAHA SYARIAH",
    "lampung": "PT.BANK PEMBANGUNAN DAERAH LAMPUNG",
    "maluku": "PT.BANK PEMBANGUNAN DAERAH MALUKU",
    "mandiri": "PT. BANK MANDIRI (PERSERO) TBK.",
    "mandiri_taspen": "PT. BANK MANDIRI TASPEN POS",
    "maspion": "PT. BANK MASPION",
    "mayapada": "PT. BANK MAYAPADA TBK.",
    "maybank": "PT. BANK MAYBANK INDONESIA TBK.",
    "maybank_syar": "PT. BANK MAYBANK SYARIAH INDONESIA",
    "maybank_uus": "PT. BANK MAYBANK INDONESIA TBK. UNIT USAHA SYARIAH",
    "mayora": "PT. BANK MAYORA",
    "mega_syar": "PT. BANK MEGA SYARIAH",
    "mega_tbk": "PT. BANK MEGA TBK.",
    "mestika": "PT. BANK MESTIKA DHARMA",
    "metro": "PT. BANK METRO EXPRESS",
    "mitraniaga": "PT. BANK MITRANIAGA",
    "mitsubishi": "THE BANK OF TOKYO MITSUBISHI UFJ LTD.",
    "mizuho": "PT. BANK MIZUHO INDONESIA",
    "mnc": "PT. BANK MNC INTERNASIONAL TBK.",
    "muamalat": "PT. BANK MUAMALAT INDONESIA",
    "multiarta": "PT. BANK MULTI ARTA SENTOSA",
    "mutiara": "PT. BANK MUTIARA TBK.",
    "niaga_syar": "PT. BANK NIAGA TBK. SYARIAH",
    "nagari": "PT. BANK NAGARI",
    "nobu": "PT. BANK NATIONALNOBU",
    "ntb": "PT. BANK PEMBANGUNAN DAERAH NTB",
    "ntt": "PT.BANK PEMBANGUNAN DAERAH NTT",
    "ocbc": "PT. BANK OCBC NISP TBK.",
    "ocbc_syar": "PT. BANK OCBC NISP TBK. - UNIT USAHA SYARIAH",
    "ok": "PT. BANK OKE INDONESIA",
    "ovo": "OVO",
    "panin": "PT. PANIN BANK TBK.",
    "panin_syar": "PT. BANK PANIN SYARIAH",
    "papua": "PT.BANK PEMBANGUNAN DAERAH PAPUA",
    "permata": "PT. BANK PERMATA TBK.",
    "permata_syar": "PT. BANK PERMATA TBK. UNIT USAHA SYARIAH",
    "permata_va": "PT. BANK PERMATA TBK. - VIRTUAL ACCOUNT",
    "prima_master": "PT. PRIMA MASTER BANK",
    "pundi": "PT. BANK PUNDI INDONESIA",
    "purba": "PT. BANK PURBA DANARTA",
    "qnb": "PT. BANK QNB INDONESIA TBK.",
    "rabobank": "PT. BANK RABOBANK INTERNATIONAL INDONESIA",
    "rbos": "THE ROYAL BANK OF SCOTLAND N.V.",
    "resona": "PT. BANK RESONA PERDANIA",
    "riau": "PT. BANK PEMBANGUNAN DAERAH RIAU KEPRI",
    "riau_syar": "PT. BANK PEMBANGUNAN DAERAH RIAU KEPRI SYARIAH",
    "sampoerna": "PT. BANK SAHABAT SAMPOERNA",
    "sbi": "PT. BANK SBI INDONESIA",
    "seabank": "PT. BANK SEABANK INDONESIA",
    "shinhan": "PT. BANK SHINHAN INDONESIA",
    "sinarmas": "PT. BANK SINARMAS",
    "sinarmas_syar": "PT. BANK SINARMAS UNIT USAHA SYARIAH",
    "stanchard": "STANDARD CHARTERED BANK",
    "sulselbar": "PT. BANK SULSELBAR",
    "sulselbar_syar": "PT. BANK SULSELBAR UNIT USAHA SYARIAH",
    "sulteng": "PT. BPD SULAWESI TENGAH",
    "sultenggara": "PT. BPD SULAWESI TENGGARA",
    "sulut": "PT. BANK SULUTGO",
    "sumbar": "BPD SUMATERA BARAT",
    "sumitomo": "PT. BANK SUMITOMO MITSUI INDONESIA",
    "sumsel_babel": "PT. BPD SUMSEL DAN BABEL",
    "sumsel_babel_syar": "PT. BPD SUMSEL DAN BABEL UNIT USAHA SYARIAH",
    "sumut": "PT. BANK PEMBANGUNAN DAERAH SUMUT",
    "sumut_syar": "PT. BANK PEMBANGUNAN DAERAH SUMUT UUS",
    "uob": "PT. BANK UOB INDONESIA",
    "victoria": "PT. BANK VICTORIA INTERNATIONAL",
    "victoria_syar": "PT. BANK VICTORIA SYARIAH",
    "woori": "PT. BANK WOORI SAUDARA INDONESIA 1906 TBK.",
    "yudha_bhakti": "PT. BANK YUDHA BHAKTI"
}

export function searchData(keyword, data, callback) {
    const lowerKeyword = keyword.toLowerCase();

    const result = Object.entries(data).filter(
        ([key, name]) =>
            key.toLowerCase().includes(lowerKeyword) ||
            name.toLowerCase().includes(lowerKeyword)
    );

    callback(Object.fromEntries(result));
}
