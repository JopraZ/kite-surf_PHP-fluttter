import 'package:flutter/material.dart';
import '../../widgets/primary_button.dart';

class CentreDetail extends StatelessWidget {
  final String centreName;

  const CentreDetail({required this.centreName, super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text(centreName)),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              centreName,
              style: Theme.of(context).textTheme.headlineSmall,
            ),
            const SizedBox(height: 16),
            const Text('Description du centre (API à venir)'),
            const Spacer(),
            PrimaryButton(
              label: 'Contacter le centre',
              onPressed: () {
                Navigator.pushNamed(context, '/demande');
              },
            ),
          ],
        ),
      ),
    );
  }
}
