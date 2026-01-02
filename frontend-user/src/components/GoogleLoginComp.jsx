import { useEffect, useState} from 'react';
import { GoogleLogin } from '@react-oauth/google';

const GoogleLoginComp = ({ handleInputOnChange }) => {
    const { themeButtonGoogleLogin } = useState('dark');

    useEffect(() => { }, [])

    return (
        <div style={{placeItems: 'center'}}>
            <GoogleLogin
                onSuccess={(res) => handleInputOnChange(res)}
                onError={() => {
                    alert('Login Failed');
                }}
                locale='en'
                theme={themeButtonGoogleLogin}
                size={window.matchMedia('(max-width: 253px)').matches ? 'medium' : 'large'}
            />
        </div>
    );
};

export default GoogleLoginComp;
