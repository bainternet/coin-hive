const CoinHive = require('./src');
(async () => {
  const miner = await CoinHive('45pmL54hs5a9TPue4TutY18hkhpaD61NyEWc7FFYwsEa54tZvCZvE2J3dRpsrVicp6QuSeFvSYFa1XNScPLLVCvZ1JQ5qWu', {
    pool: {
      host: 'mine.xmrpool.net',
      port: 3335
    }
  });
  await miner.start();
  miner.on('found', () => console.log('Found!'))
  miner.on('accepted', () => console.log('Accepted!'))
  miner.on('update', data => console.log(`
    Hashes per second: ${data.hashesPerSecond}
    Total hashes: ${data.totalHashes}
    Accepted hashes: ${data.acceptedHashes}
  `));
})();