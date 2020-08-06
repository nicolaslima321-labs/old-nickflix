import * as React from 'react';
import { Button, View, Text, Image } from 'react-native';

export default function LogoTitle() {
  return (
    <Image
      style={{ width: 113, height: 30 }}
      source={ require('../../assets/nickflix-logo.png') }
    />
  );
}