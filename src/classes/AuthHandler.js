import axios from 'axios'

const API = 'http://api.nickflix.test'

export default class AuthHandler {
  login () {
    axios.post(`${API}/auth/login`, data, config)
      .then((response) => this.loginSuccess(response))
      .catch((error) => this.loginFailed(error))
  }

  loginSuccess () {

  }

  loginFailed () {

  }
}