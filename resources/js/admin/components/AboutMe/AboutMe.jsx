import React, { useEffect, useState } from 'react';
import { baseURL } from '../../config';
import { useContext } from 'react';
import { AuthContextData } from '../../contexts/AuthContext';
import { useRef } from 'react';

const client = axios.create({baseURL});

const AboutMe = () => {
    const {token, login, logout} = useContext(AuthContextData);

    let [name, setName] = useState("");
    let [surname, setSurname] = useState("");
    let [desc, setDesc] = useState("");
    let [avatar, setAvatar] = useState("");

    const setStates = (resp)=>{
        setName(resp.data.data[0].name);
        setSurname(resp.data.data[0].surname);
        setDesc(resp.data.data[0].description);
        setAvatar(resp.data.data[0].avatar_url);
    }

    useEffect(()=>{
        const getInfo = async ()=>{
            const resp = await client.get('/api/info', {params: {lang: "en"}});
            setStates(resp);
            console.log(resp);
        }
        getInfo();
    }, []);

    const handleFileChange = async (e, slug) => {
        if (e.target.files) {
            const file = e.target.files[0];
            const formData = new FormData();
            formData.append(slug, file);
            
            const resp = await client.post("/api/info", formData, {
              headers: {
                "Content-Type": "multipart/form-data",
                "x-rapidapi-host": "file-upload8.p.rapidapi.com",
                "x-rapidapi-key": "your-rapidapi-key-here",
                'Authorization':`Bearer ${token}`,
              },
              params: {lang: "en", _method: "PATCH"},
            });
            setStates(resp);
            console.log(resp);
        }
    };

    const updateInfo = async ()=>{
        const resp = await client.post('/api/info', {name: name, surname: surname, description: desc}, {params: {lang: "en", _method: "PATCH"}, headers: {'Authorization':`Bearer ${token}`}} );
        setStates(resp);
        console.log(resp);
    }

    return (
        <div className='aboutMe'>
            <div className="text">
                <h1>About Me</h1>
                <p>My name is <input type="text" className='names' value={name} onChange={(e)=>{setName(e.target.value)}}/> <input type="text" className='names' value={surname} onChange={(e)=>{setSurname(e.target.value)}}/>.</p>
                <textarea  type="text" value={desc} onChange={(e)=>{setDesc(e.target.value)}}/>
                <button className='submit mt-3' onClick={updateInfo}>Send <i className="bi bi-box-arrow-in-right"></i></button>
                <br></br>
                <label htmlFor="" className='mt-3'>Upload new CV:</label><br></br>
                <input type="file" className='form-control text-white bg-dark ' onChange={(e)=>{handleFileChange(e, 'cv')}}></input>

            </div>
            <div className="img">
                <button className='btn' onClick={()=>{document.querySelector('#upload-photo').click()}}>Upload new photo</button>
                <input id='upload-photo' type="file" onChange={(e)=>{handleFileChange(e, 'avatar')}}></input>
                <img src={avatar} alt="" height="500px"/>
            </div>


        </div>
    );
}

export default AboutMe;
