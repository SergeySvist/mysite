import React, { useContext } from 'react';
import { Navigate } from 'react-router-dom';
import { AuthContextData } from '../contexts/AuthContext';

const ProtectRoute = ({children}) => {
    const {token, login, logout} = useContext(AuthContextData);

    if (!token) {
        return <Navigate to="/" replace />;
    }
    
    return children;
}

export default ProtectRoute;
