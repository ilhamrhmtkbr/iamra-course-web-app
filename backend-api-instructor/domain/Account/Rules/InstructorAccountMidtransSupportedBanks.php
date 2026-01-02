<?php

namespace Domain\Account\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Lang;

class InstructorAccountMidtransSupportedBanks implements ValidationRule
{
    private array $banks = [
        'aceh', 'aceh_syar', 'agris', 'agroniaga', 'allo',
        'amar', 'andara', 'anglomas', 'antar_daerah',
        'anz', 'artajasa', 'artha', 'bali', 'bangkok',
        'banten', 'barclays', 'bca', 'bcad', 'bca_syar',
        'bengkulu', 'bisnis', 'bjb', 'bjb_syar', 'bni',
        'bnp', 'bnp_paribas', 'boa', 'bri', 'bsi', 'btn',
        'btn_syar', 'btpn', 'btpn_syar', 'bukopin', 'bukopin_syar',
        'bumiputera', 'bumi_artha', 'capital', 'centratama',
        'chase', 'china', 'china_cons', 'chinatrust', 'cimb',
        'cimb_syar', 'cimb_rekening_ponsel', 'cimb_va',
        'citibank', 'commonwealth', 'danamon', 'danamon_syar',
        'dbs', 'deutsche', 'dipo', 'diy', 'diy_syar', 'dki',
        'dki_syar', 'ekonomi', 'fama',  'ganesha',
        'gopay', 'hana', 'hs_1906', 'hsbc', 'icbc',
        'ina_perdana', 'index_selindo', 'india', 'jago',
        'jago_syar', 'jambi', 'jasa_jakarta', 'jateng',
        'jateng_syar', 'jatim', 'jatim_syar', 'jtrust',
        'kalbar', 'kalbar_syar', 'kalsel', 'kalsel_syar',
        'kalteng', 'kaltim', 'kaltim_syar', 'lampung',
        'maluku', 'mandiri', 'mandiri_taspen', 'maspion',
        'mayapada', 'maybank', 'maybank_syar', 'maybank_uus',
        'mayora', 'mega_syar', 'mega_tbk', 'mestika',
        'metro', 'mitraniaga', 'mitsubishi', 'mizuho',
        'mnc', 'muamalat', 'multiarta', 'mutiara',
        'niaga_syar', 'nagari', 'nobu', 'ntb', 'ntt',
        'ocbc', 'ocbc_syar', 'ok', 'ovo', 'panin',
        'panin_syar', 'papua', 'permata', 'permata_syar',
        'permata_va', 'prima_master', 'pundi', 'purba',
        'qnb', 'rabobank', 'rbos', 'resona', 'riau',
        'riau_syar', 'sampoerna', 'sbi', 'seabank',
        'shinhan', 'sinarmas', 'sinarmas_syar', 'stanchard',
        'sulselbar', 'sulselbar_syar', 'sulteng',
        'sultenggara', 'sulut', 'sumbar', 'sumitomo',
        'sumsel_babel', 'sumsel_babel_syar', 'sumut',
        'sumut_syar', 'uob', 'victoria', 'victoria_syar',
        'woori', 'yudha_bhakti'
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value, $this->banks)){
            $fail(Lang::get('request-instructor.account_upsert_failed_no_bank_provided'));
        }
    }
}
